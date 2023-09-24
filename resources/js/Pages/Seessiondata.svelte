<script>
    let user_id,Password;
    async function getSessionData()
    {
        const response=await fetch('/get-session');
        const data=await response.json();
        user_id=data.user_id;
        Password=data.password;
    }

    getSessionData();
</script>

<h1>User_Id: {user_id}</h1>
<h2>Password: {Password}</h2>