
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id='app'>
	Select Section:
	<select name="" id="" v-on:change='fetchStudents()' v-model='selected_section'>
		@foreach($sections as $section)
		<option value="{{ $section->id }}">{{ $section->name }}</option>
		@endforeach
	</select>
	Students:
	<select name="" id="" >
		<option v-for="student in students" :value="student.id">@{{ student.first_name }}</option>
	</select>
	<ul>
		<li v-for="student in students" :value="student.id">@{{ student.first_name }}</li>
	</ul>
</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var vm = new Vue ({
		el: '#app',
		data:{
			selected_section: '',
			students: [],
		},
		methods: {
			fetchStudents(){
				axios.get('/students?section_id='+this.selected_section).then(({data}) => {
					this.students = data
					console.log(data);
				}).catch(function(error) {
                console.log('an error occured ' + error);
            });
			}
		},
		mounted(){
			axios.get('/students').then(({data}) =>{
				console.log(data)
			}).catch(function(error) {
                console.log('an error occured ' + error);
            });

		}
	})

</script>

</html>