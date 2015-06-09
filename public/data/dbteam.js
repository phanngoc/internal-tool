(function() {

    var dbteam = {

        getUser: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getusers/all",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getGroup: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getgroups",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getTeam: function(id)
        {
        var rs=null;
        $.ajax({
                url: "projects/getteam/"+id,
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            this.clients= rs;
            //return rs;
        },
        loadData: function(filter) {

            return $.grep(this.clients, function(client) {
                return (!filter.Name || client.Name.indexOf(filter.Name) > -1)
                    && (!filter.Age || client.Age === filter.Age)
                    && (!filter.Address || client.Address.indexOf(filter.Address) > -1)
                    && (!filter.Country || client.Country === filter.Country)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            insertingClient['_token']=$('#_token').val();
            insertingClient['project_id']=$('#project_id').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "projects/team",
                type: "POST",
                async : false,
                data: JSON.stringify(insertingClient),
                contentType: "application/json; charset=utf-8"
            });
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) {
            
            updatingClient['_token']=$('#_token').val();
            updatingClient['_method']="PUT";
            $.ajax({
                url: "projects/team/"+updatingClient['id'],
                type: "POST",
                async : false,
                data: JSON.stringify(updatingClient),
                contentType: "application/json; charset=utf-8"
            });
        },

        deleteItem: function(deletingClient) {

            deletingClient['_token']=$('#_token').val();
            deletingClient['_method']="DELETE";
            $.ajax({
                url: "projects/team/"+deletingClient['id'],
                type: "POST",
                async : false,
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            });
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };
    window.dbteam = dbteam;
    dbteam.groups=dbteam.getGroup();
    dbteam.users=dbteam.getUser();
    //dbteam.getTeam();
    /*window.dbteam = dbteam;
    dbteam.clients =null;
    dbteam.users =null;
    dbteam.status =null;
    $.ajax({
        url: "projects/getteam",
        dataType: "json",
        async : false
    }).done(function(response) {
        dbteam.clients=response;
    });*/

     /*$.ajax({
        url: "projects/getusers",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.users=response;
    });

     $.ajax({
        url: "projects/getstatus",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.status=response;
    });*/
    //db.groups="[{'id':6,'groupname':'Dev'},{'id':7,'groupname':'Test'},{'id':8,'groupname':'Manager'},{'id':9,'groupname':'Compoter'},{'id':10,'groupname':'Account'},{'id':11,'groupname':'Manager project'}]";
    /*db.groups=null;
    $.ajax({
        url: "groups",
        dataType: "json",
        async : false
    }).done(function(response) {
        //alert(JSON.stringify(response));
        db.groups=response;
    });*/
return false;
}());