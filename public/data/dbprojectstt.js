(function() {
    var db = {
        getData: function(){
        var rs=null;
        $.ajax({
                url: "statusprojects",
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
                return (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.description || client.description === filter.description);
            });
        },

        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "statusprojects",
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
                url: "statusprojects/"+updatingClient['id'],
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
                url: "statusprojects/"+deletingClient['id'],
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
        }
    };

    window.db = db;
   
}()
);