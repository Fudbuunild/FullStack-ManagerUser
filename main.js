var selectAllUsers
var selectUsers = [];
var selectMas = {}

var result = $("#result");

function updateTable() {
    $.ajax({
        type: "GET",
        url: 'us.php',
        success: function (data) {
            result.html("")
            result.append(data)
            updateButtons()
        },
        dataType: "html"
    });
}

function updateButtons() {
    $(".btn-edit").click(function () {
        var user = $(this).parent("td").parent("tr")
        var f = $(this).attr('value');
        //$("#modalWindow").load("modalwindow.html #exampleModal", function () {
        $('#userid').val(f)
        $('#operation').val("update")
        $('#first-name').val(user.children(".td-firstname").text())
        $('#last-name').val(user.children(".td-lastname").text())
        var role = user.children(".td-role").text()
        $("select").val(role).change()
        if (user.children(".td-status").children("div").hasClass("greenCircle")) {
            $('#customSwitch2').prop("checked", true)
        } else {
            $('#customSwitch2').prop("checked", false)
        }
        $('#exampleModal').modal('show');
        $('#exampleModalLabel').text('Edit User')
        $('#send').text('Edit')
        // });
    });

    $(".btn-delete").click(function () {
        var btn = $(this)
        confirm(d)
        var f = $(this).attr('value');

        function d() {
            $.ajax({
                type: "POST",
                url: 'usermanager.php',
                data: {
                    "id": f,
                    "op": "delete"
                },
                success: function (data) {
                    btn.parent("td").parent("tr").remove()
                },
                dataType: "html"
            });
        }
    });


    $(".selectUser").on('change', function () {
        if (this.checked) {
            selectUsers.push($(this).attr('value'));
            selectMas = {
                id: selectUsers
            }
        } else {
            let a = $(this)
            $(".selectAllUsers").prop('checked', false)
            selectUsers.forEach(function (item, i) {
                if (a.attr('value') === item) {
                    delete selectUsers[i]
                    selectMas = {
                        id: selectUsers
                    }
                }
            })
        }
    });


    $(".selectAllUsers").change(function () {
        if (this.checked) {
            selectAllUsers = $('.selectUser').toArray();
            selectUsers = [];
            selectAllUsers.forEach(function (item) {
                selectUsers.push(item.value);
            })
            $('.selectUser').prop('checked', true);
            selectMas = {
                id: selectUsers
            }
        } else {
            $('.selectUser').prop('checked', false);
            selectUsers = [];
            selectMas = {
                id: selectUsers
            }
        }
    });
}

$(".btn-ok").click(function () {
    var selected = $(this).parent(".input-group-append").parent(".input-group").children(".selector").val()
    if (selected === 'empty') {// Перевірка опції
        warnNoSelected()

    } else {
        var result

        function isSelected(user) {

            user.each(function () {
                if ($(this).prop('checked')) {
                    result = true
                    return false
                } else
                    result = false
            })
            return result
        }

        if (!isSelected($(".selectUser"))) {
            noSelectedUser()
        } else {
            $.ajax({
                type: "POST",
                url: 'usermanager.php',
                data: selectMas = {
                    "op": selected,
                    "id": selectUsers
                },
                success: function () {
                    updateTable()
                    selectUsers = []
                    $(".selectAllUsers").prop('checked', false)
                },
                dataType: "html"
            });
        }
    }
});

var modalWindow = $('#modalWindow');

modalWindow.load("modalwindow.html #exampleModal");
modalWindow.on('shown.bs.modal', function () {
    var selectedRole =  $("#select-role").children("option:selected").val();
    $("#select-role").change(function(){
        selectedRole = $(this).children("option:selected").val();
    });

    $("#send").click(function () {
        if (selectedRole === "empty") {//213321321231
            noSelectedRole();
        }
        else {
            $('#formMod').submit(sendForm());
            $('#exampleModal').modal('hide')
        }
    });
})

modalWindow.on('hidden.bs.modal', function () {
    $(this).modal('dispose')
})


$(".btn-add").click(function () {
    $('#operation').val("create")
    $('#first-name').val("")
    $('#last-name').val("")
    $("select").val("empty").change()
    $('#customSwitch2').prop("checked", false)
    $('#exampleModal').modal('show')
    $('.modal-title').text('Add User')
    $('#send').text('Add')
});

function sendForm() {
    var data = $('#formMod').serialize()
    $.ajax({
        type: "POST",
        url: 'usermanager.php',
        data: data,
        success: function () {
            updateTable()
        },
        dataType: "html"
    });
}


var kays;

function confirm(callback) {
    $("#confirmWindow").load("confirm.html #exampleModal2", function () {
        $('#exampleModal2').modal('show');

        $('#confirm').click(function () {

            $('#exampleModal2').modal('toggle')
            kays = true;
            callback()
        });

        $('#cancel').click(function () {

            $('#exampleModal2').modal('toggle')
            kays = false

        })
    });
    return kays;
}

$("#noSelectedOptionWindow").load("noselectedoption.html #noSelectedOptionModal");

function warnNoSelected() {
    $('#noSelectedOptionModal').modal('show');
}

$("#noSelectedUserWindow").load("noselecteduser.html #noSelectedUserModal")

function noSelectedUser() {
    $('#noSelectedUserModal').modal('show');
}


$("#noSelectedRoleWindow").load("noselectedrole.html #noSelectedRoleModal")
function noSelectedRole() {

    $('#noSelectedRoleModal').modal('show');
}