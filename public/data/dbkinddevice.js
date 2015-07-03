(function() {
    var dbkinddevice = {
        gettype: function function_name () {
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
        getData: function(){
        var rs=null;
        $.ajax({
                url: "kinddevices",
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
                return (!filter.device_name || client.device_name.indexOf(filter.device_name) > -1)
                    && (!filter.quantity || client.quantity === filter.quantity);
            });
        },
     
        insertItem: function(insertingClient) {
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            var rs=null;
            $.ajax({
                url: "kinddevices",
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
                url: "kinddevices/"+updatingClient['id'],
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
                url: "kinddevices/"+deletingClient['id'],
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

    window.dbkinddevice = dbkinddevice;
   // dbskill.category=dbcategory.getData();
   
}()
);