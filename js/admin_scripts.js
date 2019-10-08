
document.addEventListener("DOMContentLoaded", () => {

    const aDeletePost = document.querySelectorAll("#aDeletePost");

    for(let i = 0; i < aDeletePost.length; i++) {

        aDeletePost[i].addEventListener("click", () => {

            let deletePost = aDeletePost[i].parentNode.parentNode.dataset.post_id;
            // let userId = aDeletePost[i].parentNode.parentNode.dataset.user_id;
            // console.log(aDeletePost[i].parentNode.parentNode);

            let confirmm = confirm("Quer mesmo apagar?");
                
                if(confirmm){
                    fetch("./delete_post/"+deletePost, {
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
                    .then(response => response.json())

                    aDeletePost[i].parentNode.parentNode.style.display = "none";

                }

        });
    }


});
