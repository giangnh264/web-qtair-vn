(function ($) {
    $(document).ready(function () {
        $("#cassiopeia-custom-user-login-form button").click(function(){
            var _agent_code = $("#cassiopeia-custom-user-login-form #edit-agent-code").val();
            var _user_name = $("#cassiopeia-custom-user-login-form #edit-username").val();
            var _pass = $("#cassiopeia-custom-user-login-form #edit-password").val();
            var data = {};
            data['agentcode'] = _agent_code;
            data['username'] = _user_name;
            data['password'] = _pass;
            $.ajax({
                method:"POST",
                url:"/cassiopeia/ajax",
                data:{
                    cmd : "agent-login",
                    data : JSON.stringify(data)
                },success:function(result){
                    if(result.response=="OK"){
                        location.href="/";
                    }else{
                        alert("Thông tin đăng nhập không đúng!");
                    }
                }
            });
            return false;
        });
    });
})(jQuery);