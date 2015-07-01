app.controller('ctrlPersediaanBarang',['$scope','$window','$http',
    function($scope,$window,$http){
        //STYLING
        var heightDoc = $window.innerHeight;//get document height
        $scope.search = $scope.editTags = $scope.BoxAlertItem = true;
        $scope.sidebarLeft = {"height":heightDoc,"position":"fixed"};//change left sidebar stye
        $scope.tags = $scope.persediaanTags = tags;
        $scope.Math = Math;
        //GET TAGS
        $scope.getTags = function()
        {
            //get latest tags
            var url = rootweb+'/ajax/persediaan/getTags';
            var ajax = $http.post(url,{idusaha:idusaha});
            ajax.success(function(response){$scope.tags = response;$scope.$apply;});            
            ajax.error(function(response){alert('terjadi masalah');});            
        }
        //GET ITEMS
        $scope.getItems = function(tag)
        {
            if(!tag)tag='';
            //loader
            $scope.TextAlertItem = 'loading...';$scope.BoxAlertItem = false;
            var url = rootweb+'/ajax/persediaan/list';
            var ajax = $http.post(url,{idusaha:idusaha,tag:tag});
            ajax.success(function(response)
                {
                    if(response.length < 1){$scope.TextAlertItem = 'persediaan kosong';}
                    else{$scope.TextAlertItem = '';$scope.BoxAlertItem = true;}
                    $scope.lists = response;
                });
            ajax.error(function(){alert('terjadi masalah');});
        };
        //SEARCH ITEMS
        $scope.searchItems = function()
        {
            //loader
            $scope.TextAlertItem = 'loading...';$scope.BoxAlertItem = false;
            var url = rootweb+'/ajax/persediaan/search';
            var keyword = $scope.TxtKeyword;
            var ajax = $http.post(url,{idusaha:idusaha,keyword:keyword});
            ajax.success(function(response)
                {
                    if(response.length < 1){$scope.TextAlertItem = 'persediaan kosong';}
                    else{$scope.TextAlertItem = '';$scope.BoxAlertItem = true;}
                    $scope.lists = response;
                });
            ajax.error(function(){alert('terjadi masalah');});
        };
        //BUTTON ACTION
        //SHOW - SEARCH
        $scope.showSearch = function(){$scope.search=$scope.search === false ? true :false};
        //SHOW - EDIT TAG
        $scope.showEditTags = function(){$scope.editTags=$scope.editTags === false ? true :false};
        //SHOW - ADD ITEM
        $scope.showAdd = function()
        {
            $('#modalTambah').modal('show');
        };
        //SHOW - UPDATE ITEM
        $scope.showUpdateItem = function()
        {
            $('#modalUpdate').modal('show');
        };
        //PROCESS - UPDATE ITEM
        $scope.actUpdateItem = function()
        {

        };
        //PROCESS - DELETE ITEM
        $scope.actDeleteItem = function(iditem)
        {
            $scope.BoxAlertItem = false;$scope.TextAlertItem = 'loading...';
            var agree = confirm('Anda Yakin!');
            if(agree == 1)
            {
                alert(iditem);
            }
        };
        //PROCESS - UPDATE TAGS
        $scope.actUpdateTags = function()
        {
            var tags = $scope.persediaanTags;//get lattest tags
            url = rootweb+'/ajax/persediaan/addTags';
            var ajax = $http.post(url,{tags:tags,idusaha:idusaha});
            ajax.success(function(){
                alert('tags sudah terupdate');
                 //update tag list
                $scope.getTags();
            });
            ajax.error(function(){alert('terjadi masalah')});
        };
        //AUTO EXEC AFTER PAGE LOAD
        $scope.getItems();//get items list
    }]);