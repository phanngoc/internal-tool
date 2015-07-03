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
            if(filter=="")
                return this.clients;
            return $.grep(this.clients, function(client) {
                return (!filter.project_name || client.project_name.search(filter.project_name) > -1)
                    && (!filter.start_date || client.start_date === filter.start_date)
                    && (!filter.end_date || client.end_date === filter.end_date)
                    && (!filter.user_id || client.user_id === filter.user_id)
                    && (!filter.status_id || client.status_id === filter.status_id);
            });
        },
        insertItem: function(insertingClient) {
            var rs=null;
            insertingClient['_token']=$('#_token').val();
            insertingClient['_method']="POST";
			insertingClient['_team']=dbteam.nodata;

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
                this.clients.unshift(rs);
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