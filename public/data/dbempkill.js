(function() {
    var dbempkill = {
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
            /*if(this.clients==null)
            {
                this.clients= this.getData();
                return this.clients;
            }*/
            return $.grep(this.clients, function(client) {
                return (!filter.skill_id || client.skill_id === filter.skill_id)
                    && (!filter.month_experience || client.month_experience === filter.month_experience);
            });
        },

        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "projects",
                dataType: "json"
                type: "POST",
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
                dataType: "json"
                type: "POST",
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
                dataType: "json"
                type: "POST",
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

    window.dbempkill = dbempkill;
}()
);