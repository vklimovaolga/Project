document.addEventListener("DOMContentLoaded", () =>{

    const buttonDelete = document.querySelector("#deleteB");
    const editButton = document.querySelectorAll("#editButton");
    const cancelButton = document.querySelector("#cancelButton");
    const confirmButton = document.querySelector("#confirmButton");
    const modal = document.getElementById("modal");

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
    
    
    let newComment = document.querySelector("#new-comment");
    
    for(let i = 0; i< editButton.length; i++) {
        
        editButton[i].addEventListener("click", () => {
            let oldComment = editButton[i].parentNode.previousElementSibling.lastElementChild;
            modal.style.display = "block";
            
                newComment.value = oldComment.textContent;
                let newss = newComment.value;
                // console.log(newss);

                confirmButton.addEventListener("click", () => {
                    const commentInfo = document.getElementById("comment-info");
                    const commentID = commentInfo.dataset.comment_id;
                    
                    fetch("../edit_comment/"+commentID+"&"+newss, {
                        method: "POST", 
                        mode: "same-origin", 
                        cache: "no-cache",
                        credentials: "same-origin", 
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        redirect: "follow", 
                        referrer: "no-referrer", 
                        body: "comment_id="+commentID+"&message="+newss+"",
                    })
                    .then(response => response.json())
                    
                });
            });
        }
        cancelButton.addEventListener("click", () => {
            modal.style.display = "none";
            
        });
        
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
      
    // confirmButton.addEventListener("click", () => {
    //     const commentInfo = document.getElementById("comment-info");
    //     const commentID = commentInfo.dataset.comment_id;
        
    //     fetch("../edit_comment/"+commentID, {
    //         method: "POST", 
    //         mode: "same-origin", 
    //         cache: "no-cache",
    //         credentials: "same-origin", 
    //         headers: {
    //             "Content-Type": "application/x-www-form-urlencoded",
    //         },
    //         redirect: "follow", 
    //         referrer: "no-referrer", 
    //         body: "comment_id="+commentID+"&message="+newComment+"",
    //     })
    //     .then(response => response.json())
        
    // });
    console.log(newComment);
  




    



});