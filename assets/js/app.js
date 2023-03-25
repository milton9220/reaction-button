(function($){
    $(document).ready(function() {

        $(".reaction-like").on('click',function (e){

            let $element = $(this);

            if($element.hasClass("unregister-user")){
                alert("You have to login to react this post");
                return;
            }
            ajaxReact($element,"react_like",".react-like-loader");
        });


        $(".reaction-average").on('click',function (e){

            let $element = $(this);

            if($element.hasClass("unregister-user")){
                alert("You have to login to react this post");
                return;
            }
            ajaxReact($element,"react_average",".react-average-loader");

        });

        $(".reaction-dislike").on('click',function (e){

            let $element = $(this);

            if($element.hasClass("unregister-user")){
                alert("You have to login to react this post");
                return;
            }
            ajaxReact($element,"react_dislike",".react-dislike-loader");

        });

        const ajaxReact=(element,action,loaderClass)=>{

            const data = {
                action: action,
                postId: parseInt(element.data('id'), 10),
                userId: parseInt(element.data("user"),10)
            };

            $.ajax({
                method:"POST",
                url: reactionButtonObj.ajaxURL,
                data: data,
                dataType: "json",
                beforeSend: function(){
                    $(loaderClass).css('display','block');
                },
                success:function (res){
                    element.find(".count").text(res.finalcount);
                    $(loaderClass).css('display','none');
                }
            })
        }


    });
}(jQuery));