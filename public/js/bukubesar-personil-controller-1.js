app.controller('ctrlPersonilList',['$scope','$window','$location','$http','$sce','$timeout',
    function($scope,$window,$location,$http,$sce,$timeout){
        //STYLING
        var heightDoc = $window.innerHeight;//get document height
        $scope.rootdir = rootweb;
        $scope.search = true;
        $scope.sidebarLeft = {"height":heightDoc,"position":"fixed"};//change left sidebar stye
        //BUTTON ACTION
        $scope.showSearch = function()
        {
            $scope.search =$scope.search === false ? true :false
        };
        //ADD ITEM
        $scope.showAdd = function()
        {
            $scope.searchloader=true;
            $('#addModal').modal('show');
        };
        //BAGIAN PERSONIL
        $scope.showBagian = function(iduser)
        {
            //ajax show
            var url = rootweb+'/ajax/personil/showbagian?act=show';
            var ajax = $http.post(url,{iduser:iduser,idusaha:idusaha});
            ajax.success(function(response)
            {
                $scope.htmlbagian = response;
                $('#bagianModal').modal('show');
            });
            ajax.error(function(){alert('terjadi masalah');});
        };
        //ACTION BAGIAN PERSONIL
        $scope.actionBagian = function(iduser,bagian)
        {
            $scope.loader = false;
            var url = rootweb+'/ajax/personil/ubahstatus?act=action';
            var ajax = $http.post(url,{iduser:iduser,idusaha:idusaha,bagian:bagian});
            ajax.success(function(response){if(response.length > 0){alert(response);}$scope.loader=true;return $scope.showBagian(iduser);});
            ajax.error(function(){$scope.loader=true;return alert('terjadi masalah');});
        };
        //PERSONIL LIST
        $scope.listPersonil = function(status)
        {
            $scope.errordiv = true;$scope.loader = false;
            if(!status){status = '';}
            var url = rootweb+'/ajax/personil/list?type=json&status='+status;
            var ajax = $http.post(url,{idusaha:idusaha});
            ajax.success(function(json){
                if(json.length > 0){$scope.loader=true;}else{$scope.loader=true;$scope.errordiv=false;$scope.errormessage="tidak punya personil";}
                $scope.total = 'Total : '+json.length;
                $scope.personils=json;
            });
            ajax.error(function(){$scope.loader=true;alert('terjadi masalah');});
        };
        //SHOW PERSONIL ACTIVITIES
        $scope.activitiesPersonil = function(idpersonil,nama)
        {
            var host = $location.host();
            var port = $location.port();
            var url = rootweb+'/ajax/personil/activities';
            var req = $http.post(url,{idpersonil:idpersonil});
            req.success(function(response){
                console.log(response);
                //modal show
                $scope.modalTitle = 'Aktifitas '+nama;
                $scope.modalContent = 'maksimal 100 aktifitas';
                $scope.activities = response;
                $('#myModal').modal('show');
                $scope.modalBody = '';
                $scope.modalFooter ='<a data-toggle="tooltip" title="simpan" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-save"></span></a>';
            });
            req.error(function(){alert('terjadi masalah');});
        };
        //SEARCH PERSONIL
        $scope.searchPersonil = function()
        {
            $scope.searchloader = false;
            $timeout(function()
            {
                $scope.searchkey = $scope.keyword;
                var keyword = $scope.keyword;
                $scope.keyword = keyword;
                if(!keyword){$scope.searchloader = true;}
                else{
                    //start do search
                    var url = rootweb+'/ajax/personil/search?q='+keyword;
                    var ajax = $http.get(url);
                    ajax.success(function(response){
                        if(response.length != 0){$scope.searchloader=true;}
                        else{$scope.searchloader=true;$scope.searchkey="username tidak ditemukan";}                        
                        //results list
                        $scope.searchresults = response;
                    });
                    ajax.error(function(){$scope.searchloader=true;alert('terjadi masalah');});
                }
            },1500);
        };
        //DELETE PERSONIL
        $scope.deletePersonil = function(idpersonil)
        {
            var agree = confirm('Anda yakin!');
            if(agree == true)
            {
                alert(idpersonil);
            }
        };
        //AUTO LOAD
        $scope.listPersonil('');
    }]);