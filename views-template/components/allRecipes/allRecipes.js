axios({
    method: 'post',
    url: 'http://127.0.0.1:8000/api/find-all-recipes',
    data: {
    }
}).then(function(response) {
    data = response.data['data'];
    console.log(response.data);
    // pagination
    for(i = 1; i <= response.data['last_page']; ++i) {
        $('.pagination').append(
            `<li class="page-item"><a class="pagination-link page-link" rel="${i}">${i}.</a></li>`
        );
        $('.pagination-link[rel="1"]').parent().addClass('active');
    }

    dataAllRecipes(data)

    $('.pagination-link').click(function(){
        iPageNumber = $(this).attr('rel');
        $('.active').removeClass('active')
        axios({
            method: 'post',
            url: 'http://127.0.0.1:8000/api/find-all-recipes?page='+iPageNumber,
            data: {
            }
        }).then(function(response) {
            data = response.data['data'];
            console.log(response.data);
            dataAllRecipes(data)
            $('.pagination-link[rel="'+iPageNumber+'"]').parent().addClass('active');
        });
    
    });

});

function dataAllRecipes(data){
    $('.single-blog-area').remove()
    $.each(data, function (i, obj) {
        var createdAt = new Date(obj.created_at);
        var createdAtDay = createdAt.getDate();
        var createdAtMonth =  createdAt.toLocaleString('fr', { month: 'long' });
        var createdAtYear = createdAt.getFullYear();
        var bestImage = '/upload/images/best_images/'+obj.image;
        $('.blog-posts-area').append(
            `
        <div class="single-blog-area mb-80" recipesid="${obj.id}">
            <!-- Thumbnail -->
            <div class="blog-thumbnail">
                <img src="${bestImage}" alt="">
                <!-- Post Date -->
                <div class="post-date">
                    <a href="#"><span>${createdAtDay}</span>${createdAtMonth} <br> ${createdAtYear}</a>
                </div>
            </div>
            <!-- Content -->
            <div class="blog-content">
                <a href="#" class="post-title">${obj.name}</a>
                <p>${obj.description}</p>
                <a href="#" class="btn delicious-btn mt-30">Voir plus</a>
            </div>
        </div>
    `)
    });
}