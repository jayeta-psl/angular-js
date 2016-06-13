app.controller('CustomerController', ['$scope', '$http', 'ngTableParams', '$filter', 'toaster', '$filter',
    function ($scope, $http, ngTableParams, $filter, toaster, $filter) {
    $scope.data = [];

    getResultsPage();

    //Get all the customers list
    function getResultsPage() {
        $http({
            method:'GET',
            url:'customers'
        }).then(function successCallback(response) {
                $scope.customerData = response.data;

                /* ngTable Customer Listing */
                $scope.customersTable = new ngTableParams({
                    page: 1,
                    count: 5,
                    sorting:{name:"asc"}
                }, {
                    total: $scope.customerData.length,
                    getData: function ($defer, params) {
                        $scope.data = params.sorting() ? $filter('orderBy')($scope.customerData, params.orderBy()) : $scope.customerData;
                        $scope.data = params.filter() ? $filter('filter')($scope.data, params.filter()) : $scope.data;
                        $scope.data = $scope.data.slice((params.page() - 1) * params.count(), params.page() * params.count());
                        $defer.resolve($scope.data);
                    }
                });
                /* end */
        });
    }

    //Add a customer
    $scope.saveAdd = function () {
        $http({
            method:"POST",
            url:"customerAdd",
            data:$scope.form
        }).then(function onSuccess(response) {
                $scope.data = response.data;
                toaster.clear();
                toaster.pop({
                    type: response.data.status,
                    title: response.data.title,
                    body: response.data.message,
                    bodyOutputType: 'trustedHtml'
                });
                $(".modal").modal("hide");
                getResultsPage();
            });
    }

    //Edit a customer with its details
    $scope.edit = function (id) {
        $http({
            method:'GET',
            url:'customerEdit/' + id
        }).then(function successCallback(response) {
                $scope.form = response;
            });
    }

    //Update customer record
    $scope.saveEdit = function () {
        var id = $scope.form.data.id;
        $http({
            method:"POST",
            url:"customerUpdate/" + id,
            data:$scope.form
        }).then(function onSuccess(response) {
                $(".modal").modal("hide");
                console.log(response);
                $scope.data = response.data;
                toaster.clear();
                toaster.pop({
                    type: response.data.status,
                    title: response.data.title,
                    body: response.data.message,
                    bodyOutputType: 'trustedHtml'
                });
                getResultsPage();
            });
    }

    //Delete a customer record
    $scope.remove = function (id) {
        var result = confirm("Are you sure to delete this customer?");
        if (result) {
            $http({
                method:"POST",
                url:"customerDelete/" + id,
                data:$scope.form
            }).then(function onSuccess(response) {
                    toaster.clear();
                    toaster.pop({
                        type: response.data.status,
                        title: response.data.title,
                        body: response.data.message,
                        bodyOutputType: 'trustedHtml'
                    });
                    getResultsPage();
                });
        }
    }

    //View a customer with its details
    $scope.view = [];
    $scope.view = function (id) {
        $http({
            method:'GET',
            url:'customerView/' + id
        }).then(function successCallback(response) {
                $("#view-customer").modal("show");
                $scope.view = response;
            });
    }
}
]);


