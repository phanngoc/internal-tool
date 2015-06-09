(function() {

    var db = {

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
            alert(JSON.stringify(insertingClient));
            //return false;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "projects",
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
                url: "projects/"+updatingClient['id'],
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
                url: "projects/"+deletingClient['id'],
                type: "POST",
                async : false,
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            });
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.db = db;

    db.clients =null;
    db.users =null;
    db.status =null;
    $.ajax({
        url: "projects",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.clients=response;
    });

     $.ajax({
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
    });
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
}());