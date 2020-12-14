
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
					backgroundColor: "transparent",
					borderColor: '#FC2525',
					data: data.status.incomplete
				},{
					label: "Completed",
					backgroundColor: "transparent",
					borderColor: "#008000",
					data: data.status.complete
				}]
			}, {responsive: true, maintainAspectRatio: false});
		});

		setInterval(() => {
		   axios.get('/todos/get-todo-status')
			.then(({data}) => {
				this.renderChart({
					labels: data.labels,
					datasets: [{
						label: 'Incomplete',
						backgroundColor: "transparent",
						borderColor: '#FC2525',
						data: data.status.incomplete
					},{
						label: "Completed",
						backgroundColor: "transparent",
						borderColor: "#008000",
						data: data.status.complete
    				}]
				}, {responsive: true, maintainAspectRatio: false});
			});
		}, 10000);
   }
}
</script>
