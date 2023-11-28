function getParameters(name){
    const params = new URLSearchParams(window.location.search);
    return params.get(name);
}
export default getParameters