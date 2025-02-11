<template>
    <nav class="navbar">
      <router-link to="/">Home</router-link>
      <router-link to="/shorten">Shorten</router-link>
      <router-link to="/expand">Expand</router-link>
      <router-link to="/links">Links list</router-link>
    </nav>
  </template>
  
  <style scoped>
  .navbar {
    width: 100%;
    background: white;
    padding: 15px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
  }
  
  .navbar a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
    margin: 0 20px;
    padding: 10px 15px;
    transition: 0.3s ease;
    border-radius: 5px;
  }
  
  .navbar a:hover {
    background-color: #007bff;
    color: white;
  }
  </style>
  