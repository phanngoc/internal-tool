(function() {
    var dbskill = {
        getData: function(){
        var rs=null;
        $.ajax({
                url: "skill",
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
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "skill",
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
                url: "skill/"+updatingClient['id'],
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
                url: "skill/"+deletingClient['id'],
                type: "POST",
                async : false,
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            });
        }
    };

    window.dbskill = dbskill;
   
}()
);