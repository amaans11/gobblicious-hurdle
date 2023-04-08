<script>
    const project = "{{ env('ANALYTICS_PROJECT', env('APP_NAME')) }}";
    const prop_page = {
        content_type: '{{ $page }}',
        content_ids: [project],
        project,
    };

    analytics.group(project);
    analytics.track('ViewContent', prop_page);
    fbq('track', 'ViewContent', prop_page);

</script>
