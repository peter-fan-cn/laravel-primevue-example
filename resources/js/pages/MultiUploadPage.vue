<script setup>
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Card from 'primevue/card';
import Panel from 'primevue/panel';
import FileUpload from 'primevue/fileupload';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
import {usePage} from "@inertiajs/vue3";
const toast = useToast();

const onUpload = () => {
  toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};
function handleBeforeUpload(event) {
  event.formData.append('_token', usePage().props.token)
  console.log(event)
}
</script>

<template>
  <form action="/uploads/multi" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" v-model="$page.props.token"/>
    <Card>
      <template #title>
        upload a single file
      </template>
      <template #content>
        <div class="mb-3 p-1">
          <label>File 1</label>
          <input type="file" name="file[]" class="" multiple>
        </div>
        <div class="mb-3 p-1">
          <label>File 2</label>
          <input type="file" name="file[]" class="" multiple>
        </div>
        <div class="mb-3">
          <label>Text</label>
          <InputText/>
        </div>
        <div class="mb-3">
          <Button type="submit">Submit</Button>
        </div>
      </template>
    </Card>
    <Panel header="upload with Primevue FileUpload without a form">
      <Toast />
      <FileUpload
          mode="basic"
          name="file[]"
          url="/uploads/multi"
          accept="image/*"
          :maxFileSize="1000000"
          :auto="true"
          @before-upload="handleBeforeUpload"
          @upload="onUpload" />
      <FileUpload
          name="file[]"
          url="/uploads/multi"
          accept="image/*"
          :maxFileSize="1000000"
          :multiple="true"
          @before-upload="handleBeforeUpload"
          @upload="onUpload" />
    </Panel>
  </form>
</template>

<style scoped>

</style>