<template>
	<div class="card-body" v-if="notifications">
		<div class="alert alert-info alert-dismissible fade show" id='redAlert' role="alert" v-for="notify in notifications" :key="notify">
			<strong>{{ notify.data.user_name }}</strong> Liked your post <b>{{ notify.data.post_title }}</b>
		</div>
	</div>
</template>

<script>
	import { ref, onMounted } from 'vue';

	export default{
		props:['user','user_notifications'],
	    setup(props){
	    	let users = ref([])
	    	let notifications = ref([])

	    	onMounted(() =>{
	    		notifications.value = props.user_notifications
	    		console.log(notifications.value);
	    	})

	    	Echo.private('post_like.'+props.user.id)
	          .notification((notification) => {
	            notifications.value.push(notification.notification);
	            console.log(notification);
	        })

	        return {
	        	notifications
	        }
	    }
	}
</script>