(function() {
    var dboperatingsystem = {
        getData: function(){
        var rs=null;
        $.ajax({
                url: "operatingsystems",
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
                return (!filter.os_name || client.os_name.indexOf(filter.os_name) > -1)
                    && (!filter.version || client.version === filter.version);
            });
        },

        insertItem: function(insertingClient) {
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            var rs=null;
            $.ajax({
                url: "operatingsystems",
                type: "POST",
                async : false,
                data: JSON.stringify(insertingClient),
                dataType: "json",
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
            /*if(rs['Error']!==undefined)
                alert(JSON.stringify(rs['Error']));
            else
                this.clients.push(rs);*/
        },

        updateItem: function(updatingClient) { 
            updatingClient['_token']=$('#_token').val();
            updatingClient['_method']="PUT";
            var rs=null;
            $.ajax({
                url: "operatingsystems/"+updatingClient['id'],
                type: "POST",
                async : false,
                dataType: "json",
                data: JSON.stringify(updatingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
            /*if(rs['Error']!==undefined)
                alert(JSON.stringify(rs['Error']));
            else
                this.clients.push(rs);*/
        },

        deleteItem: function(deletingClient) {
            var rs=null;
            deletingClient['_token']=$('#_token').val();
            deletingClient['_method']="DELETE";
            $.ajax({
                url: "operatingsystems/"+deletingClient['id'],
                type: "POST",
                async : false,
                dataType: "json",
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            return rs;
        }
    };

    window.dboperatingsystem = dboperatingsystem;
   
}()
);