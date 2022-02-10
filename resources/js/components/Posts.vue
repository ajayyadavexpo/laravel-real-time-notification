<template>
	<div class="container">
		<div class="card p-3">
			Notifications:
			<notify :user="user" :user_notifications="user_notifications" />
		</div>
		<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			      <th scope="col">Post_Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<template  v-for="post in posts" :key="post.id"> 
				    <tr>
				      <th scope="row">1</th>
				      <td>{{ post.title }}</td>
				      <td>{{ post.user.name }}</td>
				      <td>
				      	<button type="btn btn-sm btn-info" @click="LikePost(post.id)">Like</button>
				      </td>
				    </tr>

			  	</template>
			</tbody>
		</table>
	</div>
</template>
<script>
	import { ref, onMounted } from 'vue';
	import Notify from './PostNotify.vue'
	export default{
		props:['posts','user','user_notifications'],
		components:{
			'notify':Notify
		},
		setup(props){
			let posts = ref([])

	    	onMounted(() =>{
	    		posts.value = props.posts
	    	})

	        function LikePost(id){
	        	axios.post('/post-like',{'post_id':id}).then(response => {
	                console.log(response.data);
	            });
	        }

	        return {
	        	posts,
	        	LikePost
	        }
		}
	}
</script>