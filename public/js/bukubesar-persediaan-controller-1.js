app.controller('ctrlPersediaanBarang',['$scope','$window','$http',
    function($scope,$window,$http){
        //STYLING
        var heightDoc = $window.innerHeight;//get document height
        $scope.search = $scope.editTags = $scope.alertKosong = true;
        $scope.sidebarLeft = {"height":heightDoc,"position":"fixed"};//change left sidebar stye
        $scope.tags = $scope.persediaanTags = tags;
        //GET TAGS
        $scope.getTags = function()
        {
            //
        }
        //GET ITEMS
        $scope.getItems = function()
        {
            var url = rootweb+'/ajax/persediaan/list';
            var ajax = $http.post(url,{idusaha:idusaha,tag:""});
            ajax.success(function(response)
                {
                    if(response.length == 1){$scope.alertKosong = false;}
                    $scope.alertKosong = true;
                    $scope.lists = response;
                });
            ajax.error(function(){alert('terjadi masalah');});
        }
        //BUTTON ACTION
        //show search
        $scope.showSearch = function(){$scope.search=$scope.search === false ? true :false};
        //show edit tags
        $scope.showEditTags = function(){$scope.editTags=$scope.editTags === false ? true :false};
        //ADD ITEM
        $scope.showAdd = function()
        {
            $scope.modalTitle = 'Tambah Barang';
            $scope.modalContent = 'Konten Modal';
            $('#myModal').modal('show');
        }
        //UPDATE TAGS
        $scope.updateTags = function(){alert($scope.persediaanTags);}
        //AUTO EXEC AFTER PAGE LOAD
        $scope.getItems();//get items list
        $scope.getTags();//get tags list
    }]);