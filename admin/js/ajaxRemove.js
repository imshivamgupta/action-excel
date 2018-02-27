$(document).ready(function() {

    // Delete
    $('.remove').click(function() {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Delete id
        var deleteid = splitid[1];

        // AJAX Request
        $.ajax({
            url: '../config/remove.php',
            type: 'POST',
            data: { id: deleteid },
            success: function(response) {
                console.log(response);
                // Removing row from HTML Table
                $(el).closest('tr').css('background', 'tomato');
                $(el).closest('tr').fadeOut(800, function() {
                    $(this).remove();
                });

            }
        });

    });
    //update
    $('.update').click(function() {
        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Update id
        var updateid = splitid[1];

        var userId = this.getAttribute("data-user-id");
        var userName = this.getAttribute("data-user-name");
        var userPass = this.getAttribute("data-user-pass");
        // console.log(userId, userName, userPass);
        //Updated Value
        var currentId = $("#formId").val(userId);
        var currentName = $("#formName").val(userName);
        var currentPass = $("#formPass").val(userPass);


    });



});
var userId, userName, updateid;

function update(data) {
    var el = data;
    var id = data.id;
    var splitid = id.split("_");
    // Update id
    updateid = splitid[1];

    userId = data.getAttribute("data-user-id");
    userName = data.getAttribute("data-user-name");
    userPass = data.getAttribute("data-user-pass");
    $("#formId").val(userId);
    $("#formName").val(userName);
    $("#formPass").val(userPass);
}

// Final Submit
$('#confirm').click(function() {
    var updatedId = $("#formId").val();
    var updatedName = $("#formName").val();
    var updatedPass = $("#formPass").val();
    $.ajax({
        url: '../config/update.php',
        type: 'POST',
        data: { id: updateid, userId: updatedId, userName: updatedName, userPass: updatedPass },
        success: function(response) {
            // Removing row from HTML Table
            var msg = "You must enter a valid details";
            if (msg == response) {
                alert(msg);
            } else {
                setInterval(function() { location.reload(); }, 500);
            }
        }
    });
});