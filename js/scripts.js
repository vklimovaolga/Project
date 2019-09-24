document.addEventListener("DOMContentLoaded", () =>{

    const buttonDelete = document.querySelector("#deleteB");
    const bc = document.querySelector("#delete2");

    buttonDelete.addEventListener("click", () => {
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
            .then(response => response.json());
            
        });
        function myFunction() {
            confirm("Press a button!");
          }
             
        bc.addEventListener("click", () => {
            myFunction();
        });
});