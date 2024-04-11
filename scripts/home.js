$(document).ready(function(){
    $("#report").click(function(e){
        e.preventDefault();
        $(".display_table").load("report.php");
    })
})