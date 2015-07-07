(function() {
    var dbskill = {
        getData: function(){
        var rs=null;
        $.ajax({
                url: "skills",
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
                return (!filter.skill || client.skill.indexOf(filter.skill) > -1)
                    && (!filter.category_id || client.category_id === filter.category_id);
            });
        },
        searchData: function(search)
        {   
            var listCategory=dbcategory.clients,
            textCategory;
            $('.thinh').text("");
            return $.grep(this.clients, function(client,e) {
                textCategory = $.grep(listCategory, function(item, index) {
                    return item['id'] === client.category_id;
                })[0]['category_name'] || {};
                return (client.skill.toLowerCase().indexOf(search) > -1)
                    || (textCategory.toLowerCase().indexOf(search) > -1);
            });
        },
        insertItem: function(insertingClient) {
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
            var rs=null;
            $.ajax({
                url: "skills",
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
                url: "skills/"+updatingClient['id'],
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
                url: "skills/"+deletingClient['id'],
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

    window.dbskill = dbskill;
   // dbskill.category=dbcategory.getData();
   
}()
);