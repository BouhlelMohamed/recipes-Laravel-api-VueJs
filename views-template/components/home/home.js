    axios({
        method: 'post',
        url: 'http://mohamed-bouhlel.com/recipes/public/api/find-all-recipes',
        data: {
        }
      }).then(function (response) {
        console.log(response.data);
        
      });
      
