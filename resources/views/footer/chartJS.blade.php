<script type="text/javascript" src="{{asset('/assets/js/charts/chart.js')}}"></script>
<script>
    var articleIds  = {!! json_encode($chart->pluck('product')) !!};
    var totals      = {!! json_encode($chart->pluck('total')) !!};
</script>
<script type="text/javascript" src="{{asset('/assets/js/charts/chart_requirement.js')}}"></script>
