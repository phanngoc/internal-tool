<script type="text/javascript" src="{{ Asset('handlebars-v3.0.3.js') }}"></script>
<script type="text/javascript" src="{{ Asset('underscore/underscore.js') }}"></script>
<script type="text/javascript" src="{{ Asset('momentjs/moment.js') }}"></script>

<script type="text/javascript">

	// angular.module('chatApp', [])
	//   .controller('ChatController',['$scope','$http',function($scope,$http) {
	//   	 $http.get("{{ route('chatmanager.list',Auth::user()->id) }}")
 	// 	 .success(function(response) 
 	// 	 {
 	// 	 	$scope.listfriend =  JSON.parse(response);
 	// 	 });

		
 	//	var source   = $("#listfriend").html();
	// 	var template = Handlebars.compile(source);
	// 	var html = template(context);
	// 	$('#listpchat').html(html);
	// 	var height_real = $('#innerchat').find('ul.listfriend').height();
	// 	$('#innerchat').find('#listpchat').css({'height': height_real+'px'});

	  
    // }]);


	Handlebars.registerHelper('ifCond', function (v1, operator, v2, options) {

	    switch (operator) {
	        case '==':
	            return (v1 == v2) ? options.fn(this) : options.inverse(this);
	        case '===':
	            return (v1 === v2) ? options.fn(this) : options.inverse(this);
	        case '<':
	            return (v1 < v2) ? options.fn(this) : options.inverse(this);
	        case '<=':
	            return (v1 <= v2) ? options.fn(this) : options.inverse(this);
	        case '>':
	            return (v1 > v2) ? options.fn(this) : options.inverse(this);
	        case '>=':
	            return (v1 >= v2) ? options.fn(this) : options.inverse(this);
	        case '&&':
	            return (v1 && v2) ? options.fn(this) : options.inverse(this);
	        case '||':
	            return (v1 || v2) ? options.fn(this) : options.inverse(this);
	        default:
	            return options.inverse(this);
	    }
	});



  var ManageChat = {
  	  listfriend : [],
  	  arrAreaChat : [],
      elemListFriendChat : $('#listpchat'),
      intervalId : 0,
  	  addArea : function(item)
  	  {
  	  	var dd = _.where(this.arrAreaChat, {usergroup_id: item.usergroup_id});
  	  	if (dd.length != 0)
  	  		return;
  	  	// Them item vao mang quan li.
  	  	var positionMax = _.max(this.arrAreaChat, function(area){ return area.position; }).position;
  	  	if (typeof positionMax !== "undefined") {
		 	    item.setPosition(positionMax+1);
    		} else {
    			item.setPosition(1);
    		}
  	  	this.arrAreaChat.push(item);
  		  item.render();
    		item.loop();
  	  },

  	  findAreaPos : function(pos)
  	  {
  	  	var item = {};
  	  	$.each(this.arrAreaChat,function(key,value){
  	  	   if(value.position == pos)
  	  	   {
  	  	   	item = value;
  	  	   }
  	  	});
  	  	return item;
  	  },

  	  removeAreaByPost : function(pos)
  	  {
  	  	/* Remove trong giao dien */
        var itemArea = this.findAreaPos(pos);
        itemArea.stopLoop();
  	  	itemArea.remove();

  	  	this.arrAreaChat = _.filter(this.arrAreaChat, function(item){ return item.position != pos; });
  	  	_.map(this.arrAreaChat, function(item){ 
    	  		if (item.position > pos)
    	  		{
    	  			item.refreshPosition(item.position-1);
    	  		}
    	  		item.reRenderPosition();
    	  		return item; 
  	  	});
  	  },

      loopNofityNew : function() {
        var $this = this;
        this.intervalId = setInterval(function() { 
          $.ajax({
            url : '{{ route("chatmanager.nofifymessagechat") }}',
            method : 'GET',
            success : function(response) {
              var results = JSON.parse(response);
              $('#listpchat').find('li').css({'background-color' : '#E9EAED'});
              $.each(results, function(key, value) {
                $('#listpchat').find('li[user_me='+value+']').css({'background-color' : '#b8b8ba'});
              });
              
            }
          });
        }, 3000);
      } 
  };

  var UrlBase = '{{URL::to("/")}}/';

  var wrapdata = {
  	  position : 1,
  	  messages : [],
  	  flagloop : true,
      frameChat : null,
      intervalId : 0,
  	  setPosition : function(pos){
  	  	this.position = pos;
  	  },

  	  refreshPosition : function(pos)
  	  {
  	  	$('#area-chat').find('.position'+this.position+' .chatone').attr('dataPos',''+pos);
  	  	$('#area-chat').find('.position'+this.position).removeClass('position'+this.position).addClass('position'+pos);
  	  	this.position = pos;
  	  },

  	  init : function(user_me, usergroup_id, messages, title)
  	  {
  	  	this.usergroup_id = usergroup_id;
  	  	this.messages = messages;
  	  	this.user_me = user_me;
  	  	this.title = title;
        frameChat = $('#area-chat').find('.position'+this.position);
  	  },

      eventWhenScrollTop : function () {
        var $this = this;
        $('#area-chat').find('.position'+this.position+' .content-message').scroll(function(event){
          var st = $(this).scrollTop();
          if (st == 0) {
            $this.renderOldMessage();
          }
        });
      },

      renderOldMessage : function() {
        var $this = this;
        var $elemChatOne = $('#area-chat').find('.position'+this.position).find('.chatone');
        var usergroup_id = $elemChatOne.attr('usergroup_id');
        var user_me = $elemChatOne.attr('user_me');

        var time = _.min(this.messages, function(mes) { return mes.time; }).time;
        $.ajax({
          url : UrlBase+'chat/people/' + usergroup_id + '/' + user_me,
          data : {time : time},
          method : 'GET',
        }).done(function(response){
          var result = JSON.parse(response); 
          $this.messages = _.union(result.messages, $this.messages);
          console.log($this.messages);
          $this.render(false);
          // When i prepend old message, it is automatically lost event scroll. Because i will insert new html here.
          $this.eventWhenScrollTop();
        });
      },

  	  addItem : function(item){
  	  	this.messages.push(item);
  	  	this.renderAddItem(item);
  	  },

  	  renderAddItem : function(item)
  	  {
  	  	$('#area-chat').find('.position'+this.position).find('.content-message ul').append('<li> \
  			  <img src="'+UrlBase+item.avatar+'" width="30" height="30" class="avatarchat"> \
   			  <div class="content-right"> \
  			  	  <div class="message"> \
  				    <span>' + item.message + '</span>' + 	
  				  '</div>  \
  				  <time data-time="'+item.time+'">'+item.time+'</time> \
  			  </div> \
  		  </li>');
        this.filterTimeHuman();
  	  },

  	  reRenderPosition : function()
  	  {
  	  	var right = 245 * this.position;
  	  	$('#area-chat').find('.position'+this.position).find('.chatone').css({ 'right' : right+'px' });
  	  },

  	  remove : function()
  	  {
  	  	$('#area-chat').find('.position'+this.position).remove();
  	  },

      filterTimeHuman : function()
      {
        $('#area-chat').find('.position'+this.position).find('time').each(function(key, value) {
           var timeText = $(value).data("time");
           var time = moment.unix(timeText).fromNow();
           $(value).text(time);
        });
      },

  	  render : function(isScrollBottom)
  	  {
        isScrollBottom = typeof isScrollBottom !== 'undefined' ? isScrollBottom : true;
  	  	var context = {dataPos : this.position, user_me : this.user_me, usergroup_id: this.usergroup_id, messages : this.messages , title : this.title};
    	  var source   = $("#chatfriend").html();
    		var template = Handlebars.compile(source);
    		var html = template(context);
    		if($('#area-chat').find('.position'+this.position).length == 0)
    		{
    			$('#area-chat').append('<div class="position'+this.position+'"></div>');
    		}
    		$('#area-chat').find('.position'+this.position).html(html);
        this.filterTimeHuman();

    		var right = 245 * this.position;
    		var divChatone = $('#area-chat').find('.position'+this.position).find('.chatone'); 
    		divChatone.css({ 'right' : right+'px' });
    		// scroll message xuong bottom
        if (isScrollBottom) {
            console.log("isScrollBottom");
            var divContentMessage = divChatone.find('.content-message');
            divContentMessage.scrollTop(divContentMessage.prop("scrollHeight"));
            this.eventWhenScrollTop();
        } 
  	  },

  	  loop : function()
  	  {
  	  	var $this = this;
  	  	this.intervalId = setInterval(function(){ 
  	  		if ($this.flagloop) {
    	  			// Lay tin nhan moi nhat gui len server de tim co message nao moi hon khong roi gui ve
    	  			var time = _.max($this.messages, function(mes){ return mes.time; }).time;
              console.log(time);
    	  			if(!time) {
      				 	time = 0;
      				}

    	  	  	$.ajax({
    		  			url : UrlBase+'notifyPostNew/' + $this.usergroup_id + '/' + time,
    		  			method : 'GET',
    		  		}).done(function(response) {
    		  			var messages = JSON.parse(response); 
    		  			$.each(messages,function(key,value){
    	  					$this.addItem(value);
    		  			});
    		  		});
  	  		}
  	  		else
  	  		{
  	  			clearInterval(IntervalId);
  	  		}
  	  	}, 3000);
  	  },
  	  stopLoop : function()
  	  {
  	  	clearInterval(this.intervalId);
  	  },
  };

  // height of div list chat
  var height_real = 0;
  $(document).ready(function(){
  	$.ajax({
  		url : '{{ route("chatmanager.list",Auth::user()->id) }}',
  		type : 'GET',
  	}).done(function(data){
  		//console.log(JSON.parse(data));
  		var context = {listfriend : JSON.parse(data)};
  		var source   = $("#listfriend").html();
  		var template = Handlebars.compile(source);
  		var html = template(context);
  		$('#listpchat').find('.content-list-friend').html(html);
  		height_real = $('#innerchat').find('ul.listfriend').height() + 25;
  		$('#innerchat').find('#listpchat').css({'height': height_real+'px'});
  		// Luu lai listfriend , de phong dung lan khac
      ManageChat.loopNofityNew();
  		ManageChat.listfriend = JSON.parse(data);
  	});

  	$('html').on('click','*[bom-click]',function(){
  		var usergroup_id = $(this).attr('bom-click');
  		var user_me = $(this).attr('user_me');
  		var title = _.where(ManageChat.listfriend, {user_me: user_me})[0].fullname;
  		$.ajax({
  			url : UrlBase+'chat/people/' + usergroup_id + '/' + user_me,
  			method : 'GET',
  		}).done(function(response){
        var result = JSON.parse(response);
  			var messages = result.messages; 
        var group_user_id = result.group_user_id;
  			var fullname_user = '{{Auth::user()->fullname}}'; 
  			var wrapdataObj = Object.create(wrapdata);
  			wrapdataObj.init(user_me, group_user_id, messages, title);
  			// console.log(wrapdataObj);
  			/* Add va khoi dong khung chat */
  			ManageChat.addArea(wrapdataObj);
  		});
  	});

  	$('#area-chat').on('click','.chatone .header',function(){
  		if($(this).closest('.chatone').hasClass('stateDown'))
  		{
  			$(this).closest('.chatone').removeClass('stateDown');	
  		}
  		else
  		{
  			$(this).closest('.chatone').addClass('stateDown');
  		}
  	});

  	$('#area-chat').on('click','.close-chat',function(){
  		var dataPos = $(this).closest('.chatone').attr('dataPos');
  		ManageChat.removeAreaByPost(dataPos);
  	});

  	$( "html" ).on('keypress',function(e) {
  		if(e.keyCode == 13)
  		{
  			$(".frame_message").each(function(k_f,v_f){
	  			if($(v_f).is(":focus"))
		  		{
		  			var dataPos = $(v_f).closest('.chatone').attr('dataPos');
		  			var usergroup_id = $(v_f).closest('.chatone').attr('usergroup_id');
		  			var user_me = $(v_f).closest('.chatone').attr('user_me');
		  			
		  			var data = {user_me : user_me, message : $(v_f).val(), usergroup_id : usergroup_id, time : "", avatar : "<?php echo Auth::user()->employee()->get()->first()->avatar; ?>"};
		  		
		  			$.ajax({
  		  				url : '{{ route("chatmanager.people.post") }}',
  		  				method : 'POST',
  		  				data : { data : data, _token :"{{ csrf_token() }}" },
		  			}).done(function(response){
                data.time = response;
                ManageChat.findAreaPos(dataPos).addItem(data);
		  				  $(v_f).val("");
		  			});
		  		}
  			});	
  		}
	});

  	$('#listpchat').on('click','.header',function(){
  		
  		if ($('#listpchat').css('bottom') == '0px')
  		{
  			var height_down = height_real - 25;
  		  $('#listpchat').css({'bottom' : '-'+height_down+'px'});
  		}
  		else
  		{
  			$('#listpchat').css({'bottom' : '0px'});
  		}
  	});
  });
</script>

<script id="itemchat" type="text/x-handlebars-template">
    <li>
      <img src="{{URL::to('/')}}/@{{avatar}}" width="30" height="30" class="avatarchat">
      <div class="content-right">
        <div class="message">
         <span>@{{ message }}</span>  
        </div>
        <time data-time="@{{ time }}">@{{ time }}</time>
      </div>
    </li>
</script>


<!-- Block chat voi mot nguoi -->
<script id="chatfriend" type="text/x-handlebars-template">
 <div class="chatone" usergroup_id="@{{ usergroup_id }}" user_me="@{{ user_me }}" dataPos = "@{{ dataPos }}">
    <div class="inner-chat-one">	
     <div class="header">
     	<p class="name">@{{ title }}<a class="close-chat" style="color:#C2CFEA;float:right;margin-right:8px;"><i class="fa fa-times"></i></a></p>
     </div>
     <div class="content-message">
     	  <ul>
  			  @{{#each messages}}
  			  <li>
  				  <img src="{{URL::to('/')}}/@{{avatar}}" width="30" height="30" class="avatarchat">
  				  <div class="content-right">
  				  	<div class="message">
  					   <span>@{{ message }}</span>	
  					  </div>
  					  <time data-time="@{{ time }}">@{{ time }}</time>
  				  </div>
  			  </li>
  		  	@{{/each}}
		    </ul>
     </div>

	 <div class="footer">
	   <div class="inner-footer">
	     <div class="b-container">
	     	<input name="textmessage" class="frame_message"/>
	     </div>
	     <div class="b-container press">
	     	<a class="press_send"><i class="fa fa-reply"></i></a>
	     </div>	
	   </div>
	 </div>
	 </div> <!-- .inner-chat-one -->
 </div>
</script>

<!-- Block liet ke cac friend -->
<script id="listfriend" type="text/x-handlebars-template">
 <ul class="listfriend">

  	@{{#each listfriend}}
	  <li bom-click="@{{ usergroup_id }}" user_me="@{{ user_me }}">
		  <img src="{{URL::to('/')}}/@{{avatar}}" width="30" height="30" class="avatarchat">
		  <div class="namechat">
			<span>@{{fullname}}</span>	
		  </div>
		  <div class="wrapstatus">
			  @{{#ifCond status_id '==' '2'}}
			     <img src="{{ Asset('images/statusonline.png') }}" />
		 	  @{{/ifCond}}

		 	  @{{#ifCond status_id '==' '1'}}
			     <img src="{{ Asset('images/status-offline.png') }}" />
		 	  @{{/ifCond}}

		  </div>
	  </li>
  	@{{/each}}

 </ul>
</script>

<div id="wrap-chat">
	<div id="innerchat">
		<div id="listpchat">
			  <div class="header">
			    <div class="inner"><p>Friends</p></div>
			  </div>
			  <div class="content-list-friend">
			    <!-- list friend chat o day -->
			  </div>
		</div>
		<div id="area-chat">
			<!-- Them cac khung moi o day-->
		</div>
	
	</div>
</div>
<link rel="stylesheet" type="text/css" href="{{ Asset('css/chat.css') }}">