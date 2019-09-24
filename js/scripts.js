document.addEventListener("DOMContentLoaded", () =>{

    const buttonDelete = document.querySelector("#deleteB");

    function deleteConfirm() {
        let confirmm = confirm("Quer mesmo apagar?");

        if(confirmm){
           
            fetch("../delete_post/"+buttonDelete.value, {
                method: "DELETE", 
                mode: "same-origin", 
                cache: "no-cache",
                credentials: "same-origin", 
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                redirect: "follow", 
                referrer: "no-referrer", 
                body: "",
            })
            .then(response => response.json()).then(
                redirect => {
                    window.location.replace("http://localhost/PF/Project/create/profile");
                }
            ) 
        }
    }

    buttonDelete.addEventListener("click", () => {
        
        deleteConfirm();
    });
});