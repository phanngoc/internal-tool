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
                //rs.unshift({"id":"","fullname":"No Select"});
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
        		this.clients=this.getData();
        	}
            return $.grep(this.clients, function(client) {
                return (!filter.projectname || client.projectname.indexOf(filter.projectname) > -1)
                    && (!filter.startdate || client.startdate === filter.startdate)
                    && (!filter.enddate || client.enddate === filter.enddate)
                    && (!filter.user_id || client.user_id === filter.user_id)
                    && (!filter.status_id || client.status_id === filter.status_id);
            });
        },
		searchData: function(search)
        {   
            var listus=this.users,
            liststt=this.status,
            textUser, textStatus;
            return $.grep(this.clients, function(client,e) {
                textUser = $.grep(listus, function(item, index) {
                    return item['id'] === client.user_id;
                })[0]['fullname'] || {};
                textStatus = $.grep(liststt, function(item, index) {
                    return item['id'] === client.status_id;
                })[0]['name'] || {};
                return (client.projectname.indexOf(search) > -1)
                    || (textUser.indexOf(search) > -1)
                    || (textStatus.indexOf(search) > -1)
                    || (client.startdate.indexOf(search) > -1)
                    || (client.enddate.indexOf(search) > -1);
            });
        },
        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
			insertingClient['_team']=dbteam.clients;

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
            if(rs['Error']===undefined)
            {
                this.clients.push(rs);
                dbteam.nodata={};
            }
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
            if(rs['Error']===undefined)
            {
                var clientIndex = $.inArray(deletingClient, this.clients);
                this.clients.splice(clientIndex, 1);
            }
            
            return rs;
        }
    };

    window.db = db;
    db.users =db.getPM();
	db.status =db.getStatus();
}()
);