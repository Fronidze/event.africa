
Dropzone.options.myGreatDropzone = {
    paramName: "story",
    maxFiles: 1,
    complete: function (file) {
        location.reload();
    }
};

Dropzone.options.largeFiles = {
    url: '/save',
    chunking: true,
    chunkSize: 2000000,
    forceChunking: false,
    parallelChunkUploads: false,
    maxFiles: 1,
    maxFilesize: 400,
    params: function (files, xhr, chunk) {
        if (chunk) {
            return {
                uuid: chunk.file.upload.uuid,
                index: chunk.index + 1,
                total: chunk.file.upload.totalChunkCount,
                filename: chunk.file.name,
                size: chunk.file.size,
                type: chunk.file.type,
            };
        }
    },
    success: function (file, responseText, e) {
        let response = responseText;
        let wrapper = this.element.closest('.form-group');
        let input = wrapper.querySelector('input[name="file_id"]');
        if (file.upload.uuid !== undefined && input !== undefined) {
            input.value = file.upload.uuid;
        }
    }
}

Dropzone.options.singleFileStorage = {
    url: '/save-single',
    chunking: false,
    forceChunking: false,
    parallelChunkUploads: false,
    maxFiles: 1,
    maxFilesize: 8,
    params: function (file, xhr, chunk) {
        let prefix = this.element.dataset['prefix'];
        if (prefix !== undefined) {
            return {
                prefix: prefix
            }
        }
    },
    success: function (file, responseText, e) {
        let wrapper = this.element.closest('.form-group');
        let isReloaded = this.element.dataset['reload'];

        let response = responseText;
        let input = wrapper.querySelector('input[name="file_id"]');
        if (response.uuid !== undefined && input !== undefined) {
            input.value = response.uuid;
        }

        if (isReloaded !== undefined) {
            location.reload();
        }
    }
}


let moduleInit = () => {
    $('[data-input-time]').mask('00:00:00');

    $("[data-select-two]").select2({
        placeholder: "Выберите значение",
        allowClear: true
    });

    let elements = document.querySelectorAll('[data-switchery]');
    elements.forEach(element => {
        new Switchery(element, {size: 'small', color: '#1ab394'});
        element.addEventListener('change', event => {
            let status = event.target.checked;

            let uuid = event.target.dataset['bookId'];
            if (uuid !== undefined) {
                fetch('/book/' + uuid + '/status/' + (status ? 'publish' : 'unpublish'))
                    .then(response => {});
            }

            uuid = event.target.dataset['storyId'];
            if (uuid !== undefined) {
                fetch('/story/' + uuid + '/status/' + (status ? 'publish' : 'unpublish'))
                    .then(response => {});
            }

            uuid = event.target.dataset['bookRecommendationId'];
            if (uuid !== undefined) {
                fetch('/book/' + uuid + '/recommendation')
                    .then(response => {});
            }

            uuid = event.target.dataset['bookGenreRecommendationId'];
            if (uuid !== undefined) {
                console.log(uuid);
                fetch('/book/' + uuid + '/genre-recommendation')
                    .then(response => {});
            }

            uuid = event.target.dataset['storySubscribeId'];
            if (uuid !== undefined) {
                fetch('/story/' + uuid + '/subscribe/')
                    .then(response => {});
            }

        });
    });
}

$(function () {

    moduleInit();

    $('[data-form-modal]').on('click', function (event) {

        let element = event.target;
        let form = element.closest('form');

        if (form === undefined) {
            console.log('Не найдена форма');
        } else {
            let request = fetch(form.action, {
                method: 'post',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            request.then(response => {
                let modal = element.closest('.modal');
                let status = response.status;
                if (status === 201) {
                    location.reload();
                }

                if (modal !== null) {
                    $(modal).modal('hide');
                }
            });
        }

    });

    $('[data-modal-render]').on('click', function(event) {
        let target = event.target.closest('[data-modal-render]');
        let request = target.dataset['action'];
        let selector = $("#"+target.dataset['modalRender']);

        selector.modal("show");
        let form = selector.find('form').get(0);
        form.action = request;
    });

    $('[data-blur-change]').on('blur', function (event) {
        event.target.closest('form').submit();
    });

    $('[data-ajax-modal-trigger]').on('click', event => {
        let target = event.target.closest('[data-ajax-modal-trigger]');
        let modal = document.querySelector('[data-ajax-modal]');

        let requestUrl = target.dataset['ajaxModalTrigger'];
        let promise = fetch(requestUrl, {
            method: 'get',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        promise
            .then(response => {
                return response.text();
            })
            .then(content => {
                console.log(content);
                modal.querySelector('[data-ajax-modal-title]').innerHTML = 'Обновление данных';
                modal.querySelector('[data-ajax-modal-content]').innerHTML = content;
                $(modal).modal('show');
                moduleInit();
            });
    });

    $('[data-change-subsribe]').on('change', event => {
        let target = event.target.closest('[data-change-subsribe]');
        let uuid = target.dataset['changeSubsribe'];
        let token = target.dataset['csrf'];

        let request = fetch("/ajax/partial/"+uuid+"/change/subscribe", {
            method: 'put',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-Csrf-Token': token,
            }
        });
        request.then(response => {

        });
    });

    $('[data-story-title]').on('blur', event => {
        let target = event.target;
        let value = target.value;
        let uuid = target.closest('[data-story-title]').dataset['storyTitle'];

        fetch('/ajax/stories/'+uuid+'/title', {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({title: value})
        })
            .then(response => response.json())
            .then(content => {});
    });

    $('[data-story-sorting]').on('blur', event => {
        let target = event.target;
        let value = target.value;
        let uuid = target.closest('[data-story-sorting]').dataset['storySorting'];

        fetch('/ajax/stories/'+uuid+'/sorting', {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({sorting: value})
        })
            .then(response => response.json())
            .then(content => {});
    });

    let financeChart = document.querySelector('[data-finance-chart]');
    if (financeChart !== null) {
        let chartData = JSON.parse(financeChart.dataset['financeChart']);
        let datasets = [];
        for (let [key, value] of Object.entries(chartData.datasets)) {
            let data = {
                label: key,
                data: value
            };
            datasets.push(data);
        }

        console.log(datasets);
        let ctx = financeChart.getContext("2d");
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: datasets[0].label,
                        backgroundColor: 'rgba(26,179,148,0.5)',
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: datasets[0].data
                    },{
                        label: datasets[1].label,
                        backgroundColor: 'rgba(220, 220, 220, 0.5)',
                        pointBorderColor: "#fff",
                        data: datasets[1].data
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    }
});
