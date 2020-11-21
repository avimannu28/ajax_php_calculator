data = []
$(document).ready(function() {
    $("button").click(function() {
        data.push(this.value);
        $("#input").val(data.join(" "))
        if (this.value == "+") {
            data.pop()
            $.ajax({
                url: "data.php",
                type: "POST",
                data: { action: "+", data: data },
                success: function(output) {
                    if (isNaN(output)) {
                        console.log("ok")
                    } else {
                        $("#input").val(output)
                    }
                    data = []
                }
            })
        }
        if (this.value == "-") {
            data.pop()
            $.ajax({
                url: "data.php",
                type: "POST",
                data: { action: "-", data: data },
                success: function(output) {
                    if (isNaN(output)) {
                        console.log("ok")
                    } else {
                        $("#input").val(output)
                    }
                    data = []
                }
            })
        }
        if (this.value == "*") {
            data.pop()
            $.ajax({
                url: "data.php",
                type: "POST",
                data: { action: "*", data: data },
                success: function(output) {
                    if (isNaN(output)) {
                        console.log("ok")
                    } else {
                        $("#input").val(output)
                    }
                    data = []
                }
            })
        }
        if (this.value == "/") {
            data.pop()
            $.ajax({
                url: "data.php",
                type: "POST",
                data: { action: "/", data: data },
                success: function(output) {
                    if (isNaN(output)) {
                        console.log(output)
                    } else {
                        $("#input").val(output)
                    }
                    data = []
                }
            })
        }

    })
    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
        $.ajax({
            url: "data.php",
            type: "POST",
            data: { action: "refresh" },
            success: function(output) {
                console.log(output)
                $("#input").val("")
            }
        })
    }
})