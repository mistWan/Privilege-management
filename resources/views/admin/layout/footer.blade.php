<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
    $(".status").click(function (e) {
        var $target = $(e.target)
        var $id = $target.attr("post-id")
        var $status = $target.attr("post-status")
        var $url = "/admin/posts/" + $id + "/status/" + $status
        console.log()
        $.get($url, function ($data) {
            if ($data.code === 200) {
                $target.parent().parent().remove()
            }
        })
    })
</script>
</body>
</html>