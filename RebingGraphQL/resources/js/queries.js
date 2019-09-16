import Vue from 'vue';
import axios from 'axios';

let queries = {
    dashboard: '{projects{id,title,description}}',

    singleProject: `query fetchSingleProject($projectId: Int) {
        projects(projectId: $projectId) {
            id,
            title,
            description
        }
    }`
}


Vue.prototype.$query = function (queryName, queryVariables) {
    let options = {
        url: '/graphql',
        method: 'POST',
        data: {
            query: queries[queryName]
        }
    };

    if (queryVariables) {
        options.data.variables = queryVariables;
    }

    return axios(options);
}
