<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Dashboard</div>

      <div class="card-body">
        Bienvenue
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
    }
  },
  created() {
    if(this.$auth.user().mobile_verified !== 1)
    {
      this.$router.push('/verifyMobile');
    }
  },
}
</script>
