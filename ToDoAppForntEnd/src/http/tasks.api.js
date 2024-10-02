import api from "@/http/api.js";

const tasksApiResource = "/tasks";

export const allTasks = () => api.get(tasksApiResource);
export const createTask = (data) => api.post(tasksApiResource, data);
export const updateTask = (id, data) => api.put(`${tasksApiResource}/${id}`, data);
export const deleteTask = (id) => api.delete(`${tasksApiResource}/${id}`);
export const getTask = (id) => api.get(`${tasksApiResource}/${id}`);

export const completeTask = (id,data) => api.put(`${tasksApiResource}/${id}/complete`, data);