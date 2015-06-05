(function() {
    var db = {
        loadData: function(filter) {
            return $.grep(this.clients, function(client) {
                return (!filter.fullname || client.fullname.indexOf(filter.fullname) > -1)
                    && (!filter.username || client.username.indexOf(filter.username) > -1)
                    && (!filter.email || client.email.indexOf(filter.email) > -1);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { 
            alert(JSON.stringify(updatingClient));
        },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };
    window.db = db;
    db.clients=null;
    db.groups=null;
    $.ajax({
        url: "users",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.clients=response;
    });
    $.ajax({
        url: "groups",
        dataType: "json",
        async : false
    }).done(function(response) {
        db.groups=response;
        alert(response);
    });
    //return db.promise();
    //return db.clients;
    //alert(db.clients);
    //console.log(db.clients)
     //exit();
      //return db.promise();
//    db.countries = [
//        { Name: "", Id: 0 },
//        { Name: "United States", Id: 1 },
//        { Name: "Canada", Id: 2 },
//        { Name: "United Kingdom", Id: 3 },
//        { Name: "France", Id: 4 },
//        { Name: "Brazil", Id: 5 },
//        { Name: "China", Id: 6 },
//        { Name: "Russia", Id: 7 }
//    ];
    
    //db.clients.load("user");
    /*$.get("users", function(data, status){
        //db.clients= data;
        db.clients =[{"id":6,"fullname":"Phan Ngoc","username":"phann123","email":"phann123@yahoo.com"},{"id":7,"fullname":"phan duc thiet","username":"thietdn","email":"ducthietk16@gmail.com"},{"id":8,"fullname":"pham nhat","username":"nhatpd","email":"nhatpd@gmail.com"}];
        alert(db.clients);
    });
*/    /*db.clients =[{"id":6,"fullname":"Phan Ngoc","username":"phann123","email":"phann123@yahoo.com"},{"id":7,"fullname":"phan duc thiet","username":"thietdn","email":"ducthietk16@gmail.com"},{"id":8,"fullname":"pham nhat","username":"nhatpd","email":"nhatpd@gmail.com"}]*/
}());