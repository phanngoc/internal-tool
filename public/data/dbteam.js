(function() {

    var dbteam = {
        itemsdis:[],
        getUser: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getusers/all",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getGroup: function()
        {
        var rs=null;
        $.ajax({
                url: "projects/getgroups",
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            return rs;
        },
        getTeam: function(id)
        {
        if(id===""){
                this.clients=dbteam.nodata;
            }else{
        var rs=null;
        $.ajax({
                url: "projects/getteam/"+id,
                dataType: "json",
                async : false
            }).done(function(response) {
                rs= response;
            });
            this.clients= rs;
            }
            $.each(this.clients,function(index,value){
                dbteam.itemsdis.push(value['user_id']);
            });            
            $.proxy(global.itemsdis=dbteam.itemsdis, global);
        },
        loadData: function(filter) {
            return $.grep(this.clients, function(client) {
                return (!filter.Name || client.Name.search(filter.Name) > -1)
                    && (!filter.Age || client.Age === filter.Age)
                    && (!filter.Address || client.Address.search(filter.Address) > -1)
                    && (!filter.Country || client.Country === filter.Country)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },
        searchData: function(search)
        {   
            var listus=this.users,
            listgroup=this.groups,
            textUser, textGroup;
            return $.grep(this.clients, function(client,e) {
                if(client.user_id!="")
                    textUser = $.grep(listus, function(item, index) {
                        return item['id'] === client.user_id;
                    })[0]['fullname'] || {};
                if(client.group_id!="")
                    textGroup = $.grep(listgroup, function(item, index) {
                        return item['id'] === client.group_id;
                    })[0]['groupname'] || {};
                return (textUser.toLowerCase().search(search) > -1)
                    || (textGroup.toLowerCase().search(search) > -1)
                    || (client.joined.toLowerCase().search(search) > -1);
            });
        },
        insertItem: function(insertingClient) {
            var data=insertingClient;
            var rs=[];
            data['_token']=$('#_token').val();
            if($('#project_id').val()!==""){
            insertingClient['_token']=$('#_token').val();
            data['project_id']=$('#project_id').val();
            $.ajax({
                url: "projects/team",
                type: "POST",
                dataType: "json",
                async : false,
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8"
            }).done(function(response) {
                rs= response;
            });
            }else
            {
                rs=insertingClient;
            }
            if(rs['Error']===undefined)
            {
                this.clients.push(rs);
                this.nodata=this.clients;
                dbteam.itemsdis.unshift(rs['user_id']);
                $.proxy(global.itemsdis=dbteam.itemsdis, global);
            }
            return rs;
        },

        updateItem: function(updatingClient,editedItem) {
            var data=updatingClient;
            var rs=[];
            updatingClient['_token']=$('#_token').val();
            if($('#project_id').val()!==""){
                $.ajax({
                    url: "projects/team/"+updatingClient['id'],
                    type: "PUT",
                    dataType: "json",
                    async : false,
                    data: JSON.stringify(updatingClient),
                    contentType: "application/json; charset=utf-8"
                }).done(function(response) {
                    rs= response;
                });
            }else
            {
                rs=updatingClient;
            }

            if(rs['Error']===undefined)
            {
                this.nodata=this.clients;
                dbteam.itemsdis[$.inArray(editedItem['user_id'], dbteam.itemsdis)]=parseInt(rs['user_id']);
                $.proxy(global.itemsdis=dbteam.itemsdis, global);
            }
            return rs;
            },

        deleteItem: function(deletingClient) {
            var rs=deletingClient;
            deletingClient['_token']=$('#_token').val();
            deletingClient['_method']="DELETE";
            if($('#project_id').val()!==""){
                $.ajax({
                    url: "projects/team/"+deletingClient['id'],
                    type: "POST",
                    dataType: "json",
                    async : false,
                    data: JSON.stringify(deletingClient),
                    contentType: "application/json; charset=utf-8"
                }).done(function(response) {
                    rs= response;
                });
            }
            if(rs['Error']===undefined)
            {
                var clientIndex = $.inArray(deletingClient, this.clients);
                this.clients.splice(clientIndex, 1);
                this.nodata=this.clients;
                var intemdisIndex=$.inArray(deletingClient['user_id'], dbteam.itemsdis);
                dbteam.itemsdis.splice( intemdisIndex, 1 )
                $.proxy(global.itemsdis=dbteam.itemsdis, global);
                /*y.splice( $.inArray(removeItem, y), 1 );
                dbteam.itemsdis.push(rs['user_id']);*/
            }
            return rs;
            /*var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);*/
        }

    };
    window.dbteam = dbteam;
    //dbteam.clients=dbteam.clients;
    dbteam.groups=dbteam.getGroup();
    dbteam.users=dbteam.getUser();
    //dbteam.getTeam();
    /*window.dbteam = dbteam;
    dbteam.clients =null;
    dbteam.users =null;
    dbteam.status =null;
    $.ajax({
        url: "projects/getteam",
        dataType: "json",
        async : false
    }).done(function(response) {
        dbteam.clients=response;
    });*/

     /*$.ajax({
        url: "projects/getusers",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.users=response;
    });

     $.ajax({
        url: "projects/getstatus",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.status=response;
    });*/
    //db.groups="[{'id':6,'groupname':'Dev'},{'id':7,'groupname':'Test'},{'id':8,'groupname':'Manager'},{'id':9,'groupname':'Compoter'},{'id':10,'groupname':'Account'},{'id':11,'groupname':'Manager project'}]";
    /*db.groups=null;
    $.ajax({
        url: "groups",
        dataType: "json",
        async : false
    }).done(function(response) {
        //alert(JSON.stringify(response));
        db.groups=response;
    });*/
return false;
}());