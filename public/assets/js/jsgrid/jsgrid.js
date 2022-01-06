(function($) {
    "use strict";

    const status_pernikahan = [ { id: "Menikah", name:"Menikah" },{ id: "Belum Menikah", name:"Belum Menikah" }, { id: "Duda", name:"Duda" }, { id: "Janda", name:"Janda" } ]
    const gender = [ { id: "male", name:"Male" },{ id: "female", name:"Female" }, { id: "other", name:"Other" } ]
    const religion = [ { id: "Islam", name:"Islam" },{ id: "Kristen", name:"Kristen" }, { id: "Hindu", name:"Hindu" }, { id: "Budha", name:"Budha" }, { id: "Konghucu", name:"Konghucu" } ]
    const blood_group = [{id: "O", name : "O"}, {id: "A", name : "A"} , {id: "B", name : "B"} , {id: "AB", name : "AB"} , {id: "Tidak Tahu", name : "Tidak Tahu"}]
    const relationship = [{id: "Suami", name : "Suami"}, {id: "Istri", name : "Istri"} , {id: "Anak", name : "Anak"}]

    var MyDateField = function(config) {
        jsGrid.Field.call(this, config);
    };

    MyDateField.prototype = new jsGrid.Field({
        sorter: function (date1, date2) {
            return new Date(date1) - new Date(date2);
        },

        itemTemplate: function (value) {
            // return new Date(value).toISOString();
            return formatDate(new Date(value));
        },

        insertTemplate: function (value) {
            // return this._insertPicker = $("<input data-language='en'>").datepicker({defaultDate: new Date(),dateFormat: "mm/dd/yyyy"});
            return this._insertPicker = $("<input data-language='en'>").datepicker({defaultDate: new Date(),dateFormat: "yyyy/mm/dd"});

        },

        editTemplate: function (value) {
            // return this._editPicker = $("<input data-language='en'>").datepicker({ dateFormat: "mm/dd/yyyy" }).datepicker("setDate", new Date(dateConvert));
            // return this._editPicker = $("<input data-language='en'>").datepicker().datepicker("setDate", {defaultDate : new Date(value),dateFormat: "yyyy/mm/dd"});
            return this._editPicker = $("<input data-language='en' value='" + value + "'>").datepicker({defaultDate: new Date(value),dateFormat: "yyyy/mm/dd"});

        },

        insertValue: function () {
            var insertValue = this._insertPicker.datepicker("getDate");
            if (insertValue !== null && insertValue !== 'undefined') {
                // var formatedDateInsert = convertDate(insertValue);
                // console.log(formatedDateInsert);
                // console.log(new Date(formatedDateInsert).toISOString());
                return formatDate(this._insertPicker.val());//.toISOString();
                // return this._insertPicker.data("DateTimePicker").useCurrent();
            }
            return null;

        },

        editValue: function () {
            var editValue = this._editPicker.datepicker("getDate");

            if (editValue !== null && editValue !== 'undefined') {
                var test = this._editPicker.datepicker("getDate");

                // console.log(this._editPicker.attr('value'));
                // console.log(new Date(formatedDateEdit).toISOString());
                // return formatDate(this._editPicker.val());//.toISOString();
                return formatDate(this._editPicker.attr('value'));//.toISOString();
                // return this._insertPicker.data("DateTimePicker").useCurrent();
            }
            return null;
        },


    });



    jsGrid.fields.date = MyDateField;




    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();



        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        // return [month, day, year].join('/');

        return [year, month, day].join('/');
    }

    $.ajax({
        type: "GET",
        url: "/Myprofile/edut_lists",
        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    }).done(function(edu_list) {
        $("#educationalBackgrounds").jsGrid({
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 15,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete data ?",
            controller:{
                loadData : function(filter) {
                    return $.ajax({

                        type : "GET",
                        url : "/Myprofile/edu_background_list",
                        dataType: "JSON"
                    });
                },
                insertItem: function(item) {
                    return $.ajax("/Myprofile/insert_edu_backgrounds", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#educationalBackgrounds").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                },
                updateItem: function(item) {

                    return $.ajax("/Myprofile/update_edu_backgrounds", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#educationalBackgrounds").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                },
                deleteItem: function(item) {
                    // var clientIndex = $.inArray(deletingClient, this.clients);
                    // this.clients.splice(clientIndex, 1);
                    return $.ajax("/Myprofile/destroy_edu_backgrounds", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#educationalBackgrounds").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                }
            },
            fields: [
                { name: "employee_name", type: "text", title: "Employee Name" ,width: 200, editing : false,
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_name).attr('readonly', true);

                        return input;
                    }
                },
                { name: "institution_name", type: "text", title: "Institution Name", width: 200 },
                { name: "faculty", type: "text", title: "Faculty", width: 200 },
                { name: "major", type: "text", title: "Major", width: 200},
                { name: "edu_id", type: "select", title: "Educational Name", width: 200, items: edu_list.edu_list, valueField: "id", textField: "name",
                    insertTemplate: function() {
                        var defaultField = this._grid.fields[10];
                        var $insertResult  = jsGrid.fields.select.prototype.insertTemplate.call(this);
                        $insertResult .on("change", function() {
                            var res = $(this).children("option").filter(":selected").text();
                            if(res != "" && res !== null && res !== 'undefined' ) {
                                if(res == "STM/SMK/SPK") {
                                    $(".default-insert").val("0");
                                } else if(res == "SMA/SMU") {
                                    // $(".default-insert").val(res);
                                    // defaultField.insertControl.val('0');
                                    // this._grid.fields[10].insertTemplate(0).val('0');
                                    $(".default-insert").val("0");

                                } else if(res == "D0") {

                                    $(".default-insert").val("1");
                                } else if(res == "D1") {

                                    $(".default-insert").val("2");
                                } else if(res == "D2") {

                                    $(".default-insert").val("3");
                                } else if(res == "D3") {

                                    $(".default-insert").val("4");
                                } else if(res == "D4") {

                                    $(".default-insert").val("5");
                                } else if(res == "S0") {

                                    $(".default-insert").val("6");
                                } else if(res == "S1") {

                                    $(".default-insert").val("7");
                                } else if(res == "S2") {

                                    $(".default-insert").val("8");
                                } else if(res == "S3") {

                                    $(".default-insert").val("9");
                                } else {

                                    $(".default-insert").val("99");
                                }


                            } else {
                                $(".default-insert").val('-');
                            }
                        });
                        return $insertResult;
                    }
                },
                { name: "graduate_date", type: "date", title: "Graduate Date (YYYY/MM/DD)", width: 200},
                { name: "cost_category", type: "text", title: "Cost Category", width: 200},
                { name: "scholarship_institution", type: "text", title: "Scholarship Institution", width: 200},
                { name: "gpa", type: "text", title: "GPA", width: 200},
                { name: "gpa_scale", type: "text", title: "GPA Scale", width: 200},
                { name: "start_year", type: "date", title: "Start Year (YYYY/MM/DD)", width: 200},
                { name: "city", type: "text", title: "City", width: 200},
                { name: "state", type: "text", title: "State", width: 200},
                { name: "country", type: "text", title: "Country", width: 200},
                { name: "emp_no", type:"text",title: "Employee No", width: 200, editing: false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_no).attr('readonly', true);

                        return input;
                    }
                },
                { name: "user_id", type:"text",title: "User Id", width: 200, editing: false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_no).attr('readonly', true);

                        return input;
                    }
                },
                { name: "default", type:"text",title: "Default", width: 200, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);
                        input.val("-").attr('readonly', true);
                        // console.log(edu_list.emp_no);
                        // input.attr('readonly', true);

                        return input;
                    }
                },
                { name: "id", type:"text",title: "ID", width: 200, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);
                        input.val("-").attr('readonly', true);
                        // console.log(edu_list.emp_no);
                        // input.attr('readonly', true);

                        return input;
                    }
                },
                // { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                // { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
                { type: "control" }
            ]
        });
    });

    $.ajax({
        type: "GET",
        url: "/Myprofile/edut_lists"
    }).done(function(edu_list) {
        $("#familyList").jsGrid({
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 15,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete data ?",
            controller:{
                loadData : function(filter) {
                    return $.ajax({

                        type : "GET",
                        url : "/Myprofile/family_lists",
                        dataType: "JSON"
                    });
                },
                insertItem: function(item) {
                    // var jsonObj = JSON.stringify(item);
                    if(item.alive === true) {
                        item.alive = "1"
                    } else {
                        item.alive = "0"
                    }

                    if(item.health_status === true) {
                        item.health_status = "1";
                    } else {
                        item.health_status = "0";
                    }

                    // if(item.vaccine1 == true) {
                    //     item.vaccine1 = 1;
                    // } else {
                    //     item.vaccine1 = 0;
                    // }

                    // if(item.vaccine2 == true) {
                    //     item.vaccine2 = 1;
                    // } else {
                    //     item.vaccine2 = 0;
                    // }

                    // if(item.not_vaccine == true) {
                    //     item.not_vaccine = 1;
                    // } else {
                    //     item.not_vaccine = 0;
                    // }

                    if(item.date_of_birth != "") {
                        item.date_of_birth = item.date_of_birth.replace(/\//g, "-");
                    }

                    if(item.date_marital != "") {
                        item.date_marital = item.date_marital.replace(/\//g, "-");
                    }



                    return $.ajax("/Myprofile/insert_famlies", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#familyList").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                },
                updateItem: function(item) {
                    if(item.alive === true) {
                        item.alive = "1"
                    } else {
                        item.alive = "0"
                    }

                    if(item.health_status === true) {
                        item.health_status = "1";
                    } else {
                        item.health_status = "0";
                    }
                    return $.ajax("/Myprofile/update_families", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#familyList").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                },
                deleteItem: function(item) {
                    return $.ajax("/Myprofile/destroy_families", {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        data: item,
                        error: (jqXHR , status, err) => {
                            alert("Error: " + jqXHR.responseText);
                        },
                        success: (result, status, jqXHR) => {
                            // console.log(result);
                            $("#familyList").jsGrid("loadData");
                            // $("#jsGrid").jsGrid("loadData");
                        },
                    });
                }
            },
            fields: [
                { name: "employee_name", type: "text", title: "Employee Name" ,width: 200, editing : false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_name).attr('readonly', true);

                        return input;
                    }
                },
                { name: "urutan", type: "text", title: "urutan" ,width: 200, editing : false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val('1').attr('readonly', true);

                        return input;
                    }
                },
                { name: "dependent_status", type: "text", title: "Dependent Status" ,width: 200, editing : false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val('1').attr('readonly', true);

                        return input;
                    }
                },
                { name: "family_name", type: "text", title: "Family Name", width: 200},
                { name: "marital_status", type: "select", title: "Martial Status", width: 200, items:status_pernikahan, valueField:"id", textField:"name" },
                { name: "relationship", type: "select", title: "Relationship", width: 200,items:relationship, valueField:"id", textField:"name"},
                { name: "no_kk", type: "text", title: "No. KK", width: 200 },
                { name: "nik_id", type: "text", title: "NIK", width: 200},
                { name: "edu_id", type: "select", title: "Educational Name", width: 200, items: edu_list.edu_list, valueField: "id", textField: "name"},
                { name: "place_of_birth", type: "text", title: "Place Of Birth", width: 200},
                { name: "date_of_birth", type: "date", title: "Date Of Birth (YYYY/MM/DD)", width: 200},
                { name: "gender", type: "select", title: "Gender", width: 200,items:gender, valueField:"id", textField:"name"},
                { name: "date_marital", type: "date",  title: "Date Marital (YYYY/MM/DD)", width: 200},
                { name: "religion", type: "select", title: "Region", width: 200, items:religion, valueField:"id", textField:"name" },
                { name: "citizenship", type: "text",  title: "Citizenship", width: 200},
                { name: "work", type: "text",  title: "work", width: 200},
                { name: "blood_group", type: "select", title: "Blood Group", width: 200,items:blood_group, valueField:"id", textField:"name"},
                { name: "house_number", type: "text",  title: "House Number", width: 200},
                { name: "handphone_number", type: "text",  title: "Handphone Number", width: 200},
                { name: "emergency_number", type: "text",  title: "Emergency Number", width: 200},
                { name: "address", type: "text",  title: "Address", width: 200},
                { name: "city", type: "text",  title: "City", width: 200},
                { name: "province", type: "text",  title: "Province", width: 200},
                { name: "postal_code", type: "text",  title: "Postal Code", width: 200},
                { name: "alive", type: "checkbox", title: "Is Alive" },
                { name: "health_status", type: "checkbox", title: "Is Health" },
                { name: "vaccine1", type: "checkbox", title: "Vaccine 1" },
                { name: "vaccine2", type: "checkbox", title: "Vaccine 2" },
                { name: "not_vaccine", type: "checkbox", title: "Not Vaccine" },
                { name: "remarks_not_vaccine", type: "text", title: "Remarks Not Vaccine" },
                { name: "emp_no", type:"text",title: "Employee No", width: 200, editing: false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_no).attr('readonly', true);

                        return input;
                    }
                },
                { name: "user_id", type:"text",title: "User Id", width: 200, editing: false, css:"hide",
                    insertTemplate: function() {
                        var input = this.__proto__.insertTemplate.call(this);
                        // console.log(this._grid.fields[14]);

                        // console.log(edu_list.emp_no);
                        input.val(edu_list.emp_no).attr('readonly', true);

                        return input;
                    }
                 },
                { type: "control" }
            ]
        });
    });

    // $("#sorting-table").jsGrid({
    //     height:"400px",
    //     width: "100%",
    //     autoload: true,
    //     selecting: false,
    //     controller: db,
    //     fields: [
    //     { name: "Name", type: "text", width: 150 },
    //     { name: "Age", type: "number", width: 50 },
    //     { name: "Address", type: "text", width: 200 },
    //     { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
    //     { name: "Married", type: "checkbox", title: "Is Married" }
    //     ]
    // });
    // $("#sort").click ( function() {
    //     var field = $("#sortingField").val();
    //     $("#sorting-table").jsGrid("sort", field);
    // });
    // $("#batchDelete").jsGrid({
    //     width: "100%",
    //     autoload: true,
    //     confirmDeleting: false,
    //     paging: true,
    //     controller: {
    //         loadData: function() {
    //             return db.clients;
    //         }
    //     },
    //     fields: [
    //         {
    //             headerTemplate: function() {
    //                 return $("<button>").attr("type", "button").text("Delete") .addClass("btn btn-danger btn-sm btn-delete mb-0")
    //                     .click( function () {
    //                         deleteSelectedItems();
    //                     });
    //         },
    //         itemTemplate: function(_, item) {
    //             return $("<input>").attr("type", "checkbox")
    //                     .prop("checked", $.inArray(item, selectedItems) > -1)
    //                     .on("change", function () {
    //                         $(this).is(":checked") ? selectItem(item) : unselectItem(item);
    //                     });
    //         },
    //         align: "center",
    //         width: 50
    //         },
    //         { name: "Name", type: "text", width: 150 },
    //         { name: "Age", type: "number", width: 50 },
    //         { name: "Address", type: "text", width: 200 }
    //     ]
    // });
    var selectedItems = [];
    var selectItem = function(item) {
        selectedItems.push(item);
    };
    var unselectItem = function(item) {
        selectedItems = $.grep(selectedItems, function(i) {
            return i !== item;
        });
    };
    var deleteSelectedItems = function() {
        if(!selectedItems.length || !confirm("Are you sure?"))
            return;
        deleteClientsFromDb(selectedItems);
        var $grid = $("#batchDelete");
        $grid.jsGrid("option", "pageIndex", 1);
        $grid.jsGrid("loadData");
        selectedItems = [];
    };
    var deleteClientsFromDb = function(deletingClients) {
        db.clients = $.map(db.clients, function(client) {
            return ($.inArray(client, deletingClients) > -1) ? null : client;
        });
    };


})(jQuery);
