import React from 'react'
import SideBar from './components/SideBar/SideBar'
import Home from './components/Home/Home'
import './App.css'
import NavBar from './components/NavBar/NavBar'
import {BrowserRouter as Router, Route, Routes } from 'react-router'
import Chats from './components/Chats/Chats'
import Quotes from './components/Quotes/Quotes'

const App = () => (  
    <Router>
      <NavBar/>
      {/* <Quotes/> */}
      <SideBar/>
      <Routes>
        <Route path="/home" element={<Home/>} />
        <Route path="/chats" element={<Chats/>} />
      </Routes>
    </Router>
)

export default App;