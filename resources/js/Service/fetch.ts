import { ref, watchEffect, toValue } from 'vue'
import axios from 'axios';

export function useFetch(url: string) {
  const data = ref(null)
  const error = ref(null)
  console.log('useFetch');
  watchEffect(() => {
    // reset state before fetching..
    data.value = null
    error.value = null

    axios(toValue(url)).then(response => {
      console.log(response.data);
      data.value = response.data
    } ).catch(err => {
      error.value = err
    } )       
  })

  return { data, error }
}
