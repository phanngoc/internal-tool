<script type="text/javascript">
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBv6EouKtHZxh5uGVn4r3X4QRTxAdVsA7A",
    authDomain: "ims-groupchat.firebaseapp.com",
    databaseURL: "https://ims-groupchat.firebaseio.com",
    storageBucket: "bucket1",
  };

  firebase.initializeApp(config);
  var database = firebase.database();
  var storage = firebase.storage();
  var auth = firebase.auth();
</script>

<script type="text/javascript">

  var employeeId = {{$employeeId}};
  var $ulListGroup = $('#ul-list-group');
  var $wrapAreaChat = $('#wrap-area-chat');
  // body append message
  var $chatBox = $('#chat-box');
  var $inputGroup = $('#namegroup');
  var $selectEmployees = $('select[name="employees[]"]');

  var $areaAction = $('#area-action');
  var $deletegroup = $('button#deletegroup');
  var $btnActionGroup = $('button#btnActionGroup');

  $('.select2').select2();

  $(document).ready(function(){
    $('#chat-box').slimScroll({
          height: '245px',
    });
  });

  /**
   * Convert array to obj.
   * @param  {[type]} arr [description]
   * @return {[type]}     [description]
   */
  function toObject(arr) {

    var rv = {};

    for (var i = 0; i < arr.length; ++i) {

      rv[arr[i]] = true;
    }

    return rv;
  }

  /**
   * [arr_diff description]
   * @param  {[type]} a1 [description]
   * @param  {[type]} a2 [description]
   * @return {[type]}    [description]
   */
  function arr_diff (a1, a2) {

    var a = [], diff = [];

    for (var i = 0; i < a1.length; i++) {
        a[a1[i]] = true;
    }

    for (var i = 0; i < a2.length; i++) {
        if (a[a2[i]]) {
            delete a[a2[i]];
        } else {
            a[a2[i]] = true;
        }
    }

    for (var k in a) {
        diff.push(k);
    }

    return diff;

  };

  /**
   * [arr_diff description]
   * @param  {object} a1 [description]
   * @param  {object} a2 [description]
   * @return {object}    [description]
   */
  function arr_diff_key (a1, a2) {

    var a = [];

    for (var i in a1) {
        a[i] = true;
    }

    for (var i in a2) {
        if (a[i]) {
            delete a[i];
        } else {
            a[i] = true;
        }
    }

    return a;

  };


  var ChatGroup = {

    groupActive : 0,

    user : {},

    users : [],

    groups : [],

    groupsBelong : [],

    instance : {},

    getAllGroup : function() {

      var deferredObject = $.Deferred();

      var groups = database.ref('groups');

      groups.on("value", function(snapshot) {
        ChatGroup.instance.groups = snapshot.val();
        deferredObject.resolve(snapshot.val());
      }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
      });

      groups.on('child_changed', function(data) {
        console.log("group user child_changed");
        ChatGroup.groups[data.key] = data.val();

        var $liItemActive = $ulListGroup.find('li[data-groupid="'+ data.key +'"]');

        if ($liItemActive.length > 0) {
          $liItemActive.text(data.val().name);
        }

      });

      groups.on('child_added', function(data) {
        console.log("group user child_added");
        ChatGroup.groups[data.key] = data.val();

        $ulListGroup.append('<li data-groupid="'+ data.key +'"">' + data.val().name + '</li>');

      });

      groups.on('child_removed', function(data) {
        console.log("group user child_removed");

        var $liItemActive = $ulListGroup.find('li[data-groupid="'+ data.key +'"]');

        if ($liItemActive.length > 0) {
          $liItemActive.remove();
        }
      });

      return deferredObject.promise();

    },

    getCurrentUser : function() {

      var deferredObject = $.Deferred();
      var user = database.ref('users/' + employeeId);

      user.on("value", function(snapshot) {
        deferredObject.resolve(snapshot.val());
      }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
      });

      return deferredObject.promise();

    },

    setUpGuiListGroupsBelongUser : function() {

        var user = this.user;
        var datagroups = this.groups;
        var htmlListGroup = '';
        for (var key in user.groups) {
          htmlListGroup += '<li data-groupid="'+ key +'"">' + datagroups[key].name + '</li>';
        }

        $ulListGroup.html(htmlListGroup);
        this.initEventChooseGroup();
        // Click to init first group in list group.
        $ulListGroup.find('li').first().click();
    },

    initEventChooseGroup : function() {

      $ulListGroup.on('click', 'li', function() {

        // Convert button #btnActionGroup to update.
        $btnActionGroup.data('action', 'update');
        $btnActionGroup.text('Update');

        var groups = ChatGroup.groups;
        var groupId = $(this).data('groupid');

        var adminGroups = groups[groupId].admins;

        var membersId = [];

        for (var id in groups[groupId].members) {
          membersId.push(id); 
        }

        $selectEmployees.select2("val", membersId);

        $inputGroup.val(groups[groupId].name);
        
        $chatBox.html("");

        // Set group active for managing.
        ChatGroup.instance.groupActive = groupId;
        var messages = database.ref('messages/' + groupId);

        messages.on('child_added', function(data) {
           ChatGroup.instance.addCommentElement(data.val());
        });

        messages.on("value", function(snapshot) {
          
        }, function (errorObject) {
          console.log("The read failed: " + errorObject.code);
        });

        // if current user is admin.
        if (adminGroups[employeeId]) {

          $btnActionGroup.prop('disabled', false);
          $selectEmployees.prop('disabled', false);
          $deletegroup.prop('disabled', false);
   
          $selectEmployees.find('option[value="'+employeeId+'"]').attr('disabled', 'disabled');
          $selectEmployees.select2();

          var textSelect = $selectEmployees.find('option[value="'+employeeId+'"]').text();
          $selectEmployees.next().find('li[title="' + textSelect + '"]').find('span').remove();

          $inputGroup.prop('disabled', false);

        } else {

          $btnActionGroup.prop('disabled', true);
          $selectEmployees.prop('disabled', true);
          $inputGroup.prop('disabled', true);
          $deletegroup.prop('disabled', true);

        }

      });
    },

    retriveListUser : function() {

      var deferredObject = $.Deferred();
      var users = database.ref('users');
      users.on("value", function(snapshot) {
        deferredObject.resolve(snapshot.val());
      }, function (errorObject) {
        console.log("The read failed: " + errorObject.code);
      });
      return deferredObject.promise();

    },

    addCommentElement : function(data) {

      // create template for item chat.
      var source   = $("#item-chat").html();
      var template = Handlebars.compile(source);
      var users = this.users;

      var htmlItemChat = template({fullname : this.users[data.user].name, message : data.message, timestamp : moment(data.timestamp).fromNow()});

      $chatBox.append(htmlItemChat);
    },

    writeNewPost : function(userid, message) {

      var milliseconds = new Date().getTime();

      // contruct post data.
      var postData = {
        user : userid,
        message: message,
        timestamp : milliseconds,
      };

      // Get a key for a new Post.
      var newPostKey = database.ref().child('messages/' + this.groupActive).push().key;

      // Write the new post's data simultaneously in the posts list and the user's post list.
      var updates = {};
      updates['/messages/'+ this.groupActive + '/' + newPostKey] = postData;

      return database.ref().update(updates);
    },

    addEventPostMessage : function() {

      $wrapAreaChat.on('click', '#send-message', function() {
        var value = $('input[name="inputmessage"]').val();
        ChatGroup.instance.writeNewPost(employeeId, value);
      });

    },

    addEventUpdateGroup : function() {

      $areaAction.on('click', '#btnActionGroup', function() {

        if ($(this).data('action') == 'update') {

          var groups = ChatGroup.groups;
          var groupActive = ChatGroup.groupActive;
          var users = ChatGroup.users;

          // Contruct object for groups and update for active group.

          var updates = {};
          updates['/groups/' + groupActive + '/name'] = $inputGroup.val();
          updates['/groups/' + groupActive + '/members'] = toObject($selectEmployees.val());
          
          // member of group before change.
          var memberBefore = groups[groupActive].members;

          // member of group after change.
          var membersAfter = toObject($selectEmployees.val());

          // get member who need deleted.
          var membersDelete = arr_diff_key(memberBefore, membersAfter);

          // get member who need added.
          var membersAdd = arr_diff_key(membersAfter, memberBefore);

          for (var item in membersDelete) {

            updates['/users/' + item + '/groups/' + groupActive] = null;
          }

          for (var item in membersAdd) {
            
            updates['/users/' + item + '/groups/' + groupActive] = true;
          }
          
          database.ref().update(updates);
        }

      });

    },

    addEventAddGroup : function() {

      $areaAction.on('click', '#btnActionGroup', function() {

        if ($(this).data('action') == 'create') {

          var groups = ChatGroup.groups;
          var users = ChatGroup.users;

          // Contruct object for groups and update for active group.
          var objAdd = {};
          objAdd.name = $inputGroup.val();

          var objMember = toObject($selectEmployees.val());
          objMember[employeeId] = true;

          objAdd.members = objMember;
          objAdd.admins = {};
          objAdd.admins[employeeId] = true;

          // Get a key for a new Post.
          var newGroupKey = database.ref().child('groups').push().key;

          var updateGroups = {};
          updateGroups['/groups/' + newGroupKey] = objAdd;
      
          database.ref().update(updateGroups);

          // Update user belong group.
          var updateUsers = {};
          for (var i in objMember) {
            updateUsers['/users/' + i + '/groups/' + newGroupKey] = true;
          }

          database.ref().update(updateUsers);

          ChatGroup.clearFormInputGroup();

        }

      });

    },

    addEventDeleteGroup : function () {

      $areaAction.on('click', '#deletegroup', function() {

        var groups = ChatGroup.groups;

        if ($btnActionGroup.data('action') == 'update') {

          var groupActive = ChatGroup.groupActive;

          var updates = {};
          updates['/groups/' + groupActive] = null;
          
          // member of group.
          
          var memberGroups = Object.assign(groups[groupActive].members, groups[groupActive].admins);

          for (var item in memberGroups) {

            updates['/users/' + item + '/groups/' + groupActive] = null;
          }
          
          updates['/messages/' + groupActive] = null;

          database.ref().update(updates);

          $ulListGroup.find('li').first().click();
        }

      });

    },

    addEventCancelButton : function() {

      $areaAction.on('click', '#cancelgroup', function() {

        $btnActionGroup.prop('disabled', false);
        $btnActionGroup.data('action', 'create');
        $btnActionGroup.text('Create');
        
        $selectEmployees.prop('disabled', false);
        $inputGroup.prop('disabled', false);

        $deletegroup.prop('disabled', true);
        ChatGroup.clearFormInputGroup();

      });

    },

    addEventPostMessage : function() {

      $wrapAreaChat.on('click', '#send-message', function() {
        var value = $('input[name="inputmessage"]').val();
        ChatGroup.instance.writeNewPost(employeeId, value);
        $('input[name="inputmessage"]').val("");
      });

    },

    clearFormInputGroup : function() {

      $inputGroup.val("");
      $selectEmployees.val("").trigger('change');

    },

    init : function() {

      this.instance = this;
      $deletegroup.prop('disabled', true);

      $.when(this.getAllGroup(), this.retriveListUser(), this.getCurrentUser())
        .done(function(groups, users, user){

          console.log(groups);
          console.log(users);
          console.log(user);

          ChatGroup.instance.users = users;
          ChatGroup.instance.groups = groups;
          ChatGroup.instance.user = user;

          ChatGroup.instance.setUpGuiListGroupsBelongUser();
          ChatGroup.instance.addEventPostMessage();
          ChatGroup.instance.addEventUpdateGroup();
          ChatGroup.instance.addEventAddGroup();
          ChatGroup.instance.addEventCancelButton();
          ChatGroup.instance.addEventDeleteGroup();

        });
    }


}

ChatGroup.init();

function createUser() {
  var promiseAuth = auth.createUserWithEmailAndPassword("phann123@yahoo.com","123456");
  promiseAuth.then(function(response) {
    console.log(response.val());
  });
}

function signInUser() {
  var user = auth.signInWithEmailAndPassword("phann123@yahoo.com", "123456");
}

signInUser();

</script>