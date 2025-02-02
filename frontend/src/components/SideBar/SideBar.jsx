import React from 'react'
import './SideBar.css'
import { NavLink } from 'react-router-dom';
import { IoMdAddCircleOutline } from "react-icons/io";

const SideBar = () => {
  return (
    <div className='sidebar'>
        <div className="top container">
          Visit main website
        </div>
        <div className="logo">

        </div>
        <div className="content container">
          <NavLink to='/chats' className="link">
              <span><IoMdAddCircleOutline/></span>
              Chats
          </NavLink>
          <NavLink to='/home' className="link">
              {/* <span><></span> */}
              Report
          </NavLink>
          <NavLink to='/home' className="link">
              {/* <span><></span> */}
              Vision board
          </NavLink>
        </div>
        <div className="bottom container">
          
        </div>
    </div>
  )
}

export default SideBar