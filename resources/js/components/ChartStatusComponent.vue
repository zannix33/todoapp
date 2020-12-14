
<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   mounted() {

			axios.get('/todos/get-todo-status')
	 		.then(({data}) => {
		   		this.renderChart({
					labels: data.labels,
					datasets: [{
			  			label: 'Incomplete',
				 		borderColor: '#FC2525',
				 		data: data.status.incomplete
		   			}]
				}, {responsive: true, maintainAspectRatio: false});
	 		});

   }
}
</script>
