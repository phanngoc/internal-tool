(function() {
    var dbcategory = {
        getData: function(){
        var rs=null;
        $.ajax({
                url: "categoryskills",
                dataType: "json",
                type: "GET",
                async : false,
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        loadData: function(filter) {
            if(this.clients==null)
            {
                //alert('a');
                this.clients= this.getData();
                //return this.clients;
            }
            return $.grep(this.clients, function(client) {
                return (!filter.category_name || client.category_name.indexOf(filter.category_name) > -1);
            });
        },
        searchData: function(search)
        {   
            return $.grep(this.clients, function(client,e) {
                return (client.category_name.toLowerCase().indexOf(search) > -1);
            });
        },

        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            $.ajax({
                url: "categoryskills",
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(insertingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            if(rs['Error']===undefined)
            {
                this.clients.push(rs);
                $.skill.create();
            }
            return rs;
        },

        updateItem: function(updatingClient) { 
            var rs=null;
            updatingClient['_token']=$('#_token').val();
            updatingClient['_method']="PUT";
            $.ajax({
                url: "categoryskills/"+updatingClient['id'],
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(updatingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            if(rs['Error']===undefined)
            {   
                $.skill.create();
            }
            return rs;
            
        },

        deleteItem: function(deletingClient) {
            var rs=null;
            deletingClient['_token']=$('#_token').val();
            deletingClient['_method']="DELETE";
            $.ajax({
                url: "categoryskills/"+deletingClient['id'],
                type: "POST",
                async : false,
                dataType: "json",
                data: JSON.stringify(deletingClient),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            if(rs['Error']===undefined)
            {
                var clientIndex = $.inArray(deletingClient, this.clients);
                this.clients.splice(clientIndex, 1);
                $.skill.create();
            }
            return rs;
           
        }
    };

    window.dbcategory = dbcategory;
    dbcategory.clients=dbcategory.getData();
   
}()
);