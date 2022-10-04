const dating_pages = {};

dating_pages.baseURL = "http://127.0.0.1:8000/api/";

dating_pages.Console = (title, values, oneValue = true) => {
    console.log('---' + title + '---');
    if(oneValue){
        console.log(values);
    }else{
        for(let i =0; i< values.length; i++){
            console.log(values[i]);
        }
    }
    console.log('--/' + title + '---');
}

dating_pages.getAPI = async (api_url) => {
    try{
        return await axios(api_url);
    }catch(error){
        dating_pages.Console("Error from GET API", error);
    }
}

dating_pages.postAPI = async (api_url, api_data, api_token = null) => {
    try{
        return await axios.post(
            api_url,
            api_data,
            { headers:{
                    'Authorization' : "token " + api_token
                }
            }
        );
    }catch(error){
        dating_pages.Console("Error from POST API", error);
    }
}

dating_pages.loadFor = (page) => {
    eval("dating_pages.load_" + page + "();");
}

dating_pages.load_registration = async () => {
    const registration_url = `${dating_pages.baseURL}/login`;
    const response_registration = await dating_pages.getAPI(registration_url);
    dating_pages.Console("Testing API", response_registration.data.data);

    const signup = document.getElementById("signup");
    const exit_btn = document.getElementById("x-btn");
    const popup = document.getElementById("popup")

    const login_signup_toggle = () => {
        popup.classList.toggle("hide")
    }

    signup.addEventListener("click", login_signup_toggle);
    exit_btn.addEventListener("click", login_signup_toggle);

}

dating_pages.load_products = () => {}


