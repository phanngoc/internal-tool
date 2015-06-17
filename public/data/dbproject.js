(function() {
    var db = {
        getPM: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getusers/pm",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getStatus: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getstatus",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getData: function(){
        var rs=null;
        $.ajax({
                url: "projects",
                dataType: "json",
                 type: "GET",
                async : false
            }).done(function(response) {
                rs= response;
            });
            
            return rs;
        },
        loadData: function(filter) {
            if(this.clients==null)
            {
                this.clients= this.getData();
                return this.clients;
            }
            return $.grep(this.clients, function(client) {
                return (!filter.Name || client.Name.indexOf(filter.Name) > -1)
                    && (!filter.Age || client.Age === filter.Age)
                    && (!filter.Address || client.Address.indexOf(filter.Address) > -1)
                    && (!filter.Country || client.Country === filter.Country)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "projects",
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(insertingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },

        updateItem: function(updatingClient) { 
            var rs=null;
            updatingClient['_token']=$('#_token').val();
            updatingClient['_method']="PUT";
            $.ajax({
                url: "projects/"+updatingClient['id'],
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(updatingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },

        deleteItem: function(deletingClient) {
            var rs=null;
            deletingClient['_token']=$('#_token').val();
            deletingClient['_method']="DELETE";
            $.ajax({
                url: "projects/"+deletingClient['id'],
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
            /*var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);*/
        }
    };

    window.db = db;
    db.users =db.getPM();
    db.status =db.getStatus();
    /*$.ajax({
        url: "projects",
        dataType: "json",
        async : false        
    }).done(function(response) {
        db.clients=response;
        console.log(response);
    });*/

     /*$.ajax({
        url: "projects/getusers/pm",
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
    //async : false;
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
}()
);