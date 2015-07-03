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
        $scope.showUpdateItem = function(iditem)
        {
            // get data
            var url = rootweb+'/ajax/persediaan/item';
            var ajax = $http.post(url,{iditem:iditem});
            ajax.success(function(response)
            {
              console.log(response);
              $scope.TxtUpdateMerek = response.merek;
              $scope.TxtUpdateKode = response.kodeBarang;
              $scope.TxtUpdateStok = parseInt(response.stok);
              $scope.TxtUpdateProduksi = parseInt(response.hargaProduksi);
              $scope.TxtUpdateUntung = parseInt(response.untung);
              $scope.TxtUpdateDiskon = parseInt(response.diskon);
              $scope.TxtUpdateRak = response.rak;
              $scope.TxtUpdateIdItem = response.idItem;
              $scope.SlcUpdateTag = response.tagItem;
            });
            ajax.error(function(){alert('gagal akses data item')});
            $('#modalUpdate').modal('show');
        };
        //PROCESS - ADD ITEM
        $scope.actAddItem = function()
        {
            var _new = $scope;
            var Barang = {"idUsaha":idusaha,"kodeBarang":_new.TxtKode,"merek":_new.TxtMerek,
            "tagItem":_new.SlcTag,"stok":_new.TxtStok,"hargaProduksi":_new.TxtProduksi,
            "untung":_new.TxtUntung,"diskon":_new.TxtDiskon,"rak":_new.TxtRak};
            console.log(Barang);
            //clear item
            //send to db
            var url = rootweb+'/ajax/persediaan/additem';
            var ajax = $http.put(url,{barang:Barang});
            ajax.success(function(response){
                if(response == 'success')
                {
                    $scope.$apply;
                    alert('item berhasil ditambah');
                    //reseting form
                    $scope.SlcUntung = $scope.TxtKode = $scope.TxtMerek = $scope.TxtStok = $scope.TxtProduksi = $scope.TxtUntung = $scope.TxtDiskon = $scope.TxtRak = '';
                    //
                }
                else
                {
                    alert('terjadi kesalahan');
                }
            });
            ajax.error(function(response){console.log(response)});
        };
        //PROCESS - UPDATE ITEM
        $scope.actUpdateItem = function(iditem)
        {
            var _update = $scope;
            var Barang = {"idItem":iditem,"kodeBarang":_update.TxtUpdateKode,"merek":_update.TxtUpdateMerek,
            "tagItem":_update.SlcUpdateTag,"stok":_update.TxtUpdateStok,"hargaProduksi":_update.TxtUpdateProduksi,
            "untung":_update.TxtUpdateUntung,"diskon":_update.TxtUpdateDiskon,"rak":_update.TxtUpdateRak};
            console.log(Barang);
            //process update database
            var url = rootweb+'/ajax/persediaan/updateitem';
            var ajax = $http.patch(url,{barang:Barang});
            ajax.success(function(response)
                {
                    if(response=='success'){alert('data berhasil diupdate');}
                    else{alert('terjadi masalah');}
                });
            ajax.error(function(data, status, headers, config){alert('terjadi masalah');console.log({data:data,status:status,headers:headers,config:config});})
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
