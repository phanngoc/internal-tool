(function() {
    var dbmodeldevice = {
        gettype: function function_name () {
            var rs=null;
        $.ajax({
                url: "typedevices",
                dataType: "json",
                type: "GET",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getData: function(){
        var rs=null;
        $.ajax({
                url: "modeldevices",
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
                //return this.clients;
            }
            return $.grep(this.clients, function(client) {
                return (!filter.model_name || client.model_name.indexOf(filter.model_name) > -1)
                    && (!filter.type_id || client.type_id === filter.type_id);
            });
        },
         searchData: function(search)
        {   
            var listCategory=dbtypedevice.clients,
            textCategory;
            /*return $.grep(this.clients, function(client,e) {
                textCategory = $.grep(listCategory, function(item, index) {
                    return item['id'] === client.type_id;
                })[0]['type_name'] || {};
                return (client.model_name.indexOf(search) > -1)
                    || (textCategory.indexOf(search) > -1);
            });*/
        },
        insertItem: function(insertingClient) {
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            var rs=null;
            $.ajax({
                url: "modeldevices",
                type: "POST",
                async : false,
                data: JSON.stringify(insertingClient),
                dataType: "json",
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            if(rs['Error']===undefined)
            {
                this.clients.push(rs);
            }
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
                url: "modeldevices/"+updatingClient['id'],
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
                url: "modeldevices/"+deletingClient['id'],
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
            }
            return rs;
        }
    };

    window.dbmodeldevice = dbmodeldevice;
   // dbskill.category=dbcategory.getData();
   
}()
);